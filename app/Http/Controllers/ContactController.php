<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot: 'website' es un campo oculto que los humanos nunca llenan.
        // A los bots se les responde "éxito" sin enviar nada para no delatarlo.
        if ($request->filled('website')) {
            return back()->with('success', __('portfolio.contact_success'));
        }

        // email:filter (FILTER_VALIDATE_EMAIL) rechaza CRLF/saltos de línea:
        // mitiga GHSA-5vg9-5847-vvmq (CRLF en la regla email por defecto,
        // sin fix en Laravel 9 EOL) — este email se usa en replyTo.
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email:filter|max:150',
            'company' => 'nullable|string|max:100',
            'message' => 'required|string|max:3000',
            'lang'    => 'nullable|in:en,es',
        ]);

        $lang = $validated['lang'] ?? 'es';
        \Illuminate\Support\Facades\App::setLocale($lang);

        try {
            $body = implode("\n", [
                "From: {$validated['name']} <{$validated['email']}>",
                "Company: " . ($validated['company'] ?? '—'),
                "",
                $validated['message'],
            ]);

            Mail::raw($body, function ($mail) use ($validated) {
                $mail->to(config('mail.portfolio_recipient', 'sergio.denis.troche.mayta@gmail.com'))
                     ->replyTo($validated['email'], $validated['name'])
                     ->subject("Portfolio Contact: {$validated['name']}");
            });
        } catch (\Throwable $e) {
            Log::error('Contact form mail failed: ' . $e->getMessage());
            return back()->withInput()->with('error', __('portfolio.contact_error_retry'));
        }

        return back()->with('success', __('portfolio.contact_success'));
    }
}
