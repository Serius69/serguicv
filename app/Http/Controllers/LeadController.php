<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // Honeypot: respuesta de éxito falsa para bots (campo oculto llenado)
        if ($request->filled('website')) {
            return response()->json(['status' => 'ok'], 201);
        }

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            // email:filter rechaza CRLF — este email va a replyTo (ver ContactController)
            'email'    => ['required', 'email:filter', 'max:200'],
            'interest' => ['nullable', 'string', 'in:contratar,colaborar,invertir,aprender,general'],
            'source'   => ['nullable', 'string', 'max:80'],
            'section'  => ['nullable', 'string', 'max:80'],
        ]);

        // validate() omite las claves ausentes: sin estos defaults, un payload
        // sin 'section' rompía la interpolación del cuerpo del email (fallback).
        $data['interest'] = $data['interest'] ?? 'general';
        $data['source']   = $data['source']   ?? 'general';
        $data['section']  = $data['section']  ?? '';
        $data['ip']       = $request->ip();
        $data['user_agent'] = substr($request->userAgent() ?? '', 0, 200);

        // 1. Reenviar a kapitalya-admin (best-effort; sin token no se intenta)
        $adminBase  = config('services.kapitalya_admin.url');
        $adminToken = config('services.kapitalya_admin.token');

        if ($adminBase && $adminToken) {
            try {
                Http::withToken($adminToken)
                    ->timeout(4)
                    ->post(rtrim($adminBase, '/') . '/api/leads/', $data);
            } catch (\Throwable $e) {
                Log::warning('lead_admin_forward_failed', [
                    'email' => $data['email'],
                    'err'   => $e->getMessage(),
                ]);
            }
        }

        // 2. Email directo a Sergio (fallback garantizado)
        try {
            Mail::raw(
                implode("\n", [
                    "Nuevo lead desde serguicv.kapitalya.com.bo",
                    "",
                    "Nombre:   {$data['name']}",
                    "Email:    {$data['email']}",
                    "Interés:  {$data['interest']}",
                    "Fuente:   {$data['source']}",
                    "Sección:  {$data['section']}",
                    "IP:       {$data['ip']}",
                    "",
                    "Responder a: {$data['email']}",
                ]),
                function ($message) use ($data) {
                    $message
                        ->to(config('mail.lead_recipient', 'sergio.denis.troche.mayta@gmail.com'))
                        ->replyTo($data['email'], $data['name'])
                        ->subject("🚀 Nuevo lead: {$data['interest']} — {$data['name']}");
                }
            );
        } catch (\Throwable $e) {
            Log::error('lead_email_failed', ['err' => $e->getMessage()]);
        }

        Log::info('lead_received', [
            'email'    => $data['email'],
            'interest' => $data['interest'],
            'source'   => $data['source'],
        ]);

        return response()->json(['status' => 'ok'], 201);
    }
}
