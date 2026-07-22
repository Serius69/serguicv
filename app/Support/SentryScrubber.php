<?php

namespace App\Support;

use Sentry\Event;

/**
 * Filtra PII de los formularios (contacto/leads) antes de enviar a Sentry.
 *
 * Es un callable [clase, método] en config/sentry.php en lugar de un Closure:
 * los Closures no son serializables y rompían `php artisan config:cache`.
 */
class SentryScrubber
{
    public static function beforeSend(Event $event): ?Event
    {
        $request = $event->getRequest();

        if ($request !== null && isset($request['data']) && is_array($request['data'])) {
            foreach (['name', 'email', 'message'] as $field) {
                if (array_key_exists($field, $request['data'])) {
                    $request['data'][$field] = '[FILTERED]';
                }
            }
            $event->setRequest($request);
        }

        return $event;
    }
}
