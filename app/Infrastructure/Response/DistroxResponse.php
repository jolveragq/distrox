<?php

namespace App\Infrastructure\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistroxResponse
{
    /**
     * Respuesta de éxito.
     *
     * @param  mixed         $data       Datos a devolver.
     * @param  string|null   $message    Mensaje opcional.
     * @param  Request|null  $request    Instancia de la petición para extraer params.
     * @return JsonResponse
     */
    public static function success(mixed $data = null, ?string $message = null,?string $statusCode = null, ?Request $request = null): JsonResponse
    {
        if (!$request) {
            $request = request();
        }

        $params = $request
            ? [
                'method'     => $request->method(),
                'parameters' => $request->all(),
            ]
            : null;

        return response()->json([
            'status'  => 'success',
            'data'    => $data,
            'message' => $message,
            'request' => $params,
        ], $statusCode ?? 200);
    }

    /**
     * Respuesta de error.
     *
     * @param  string        $message    Mensaje de error.
     * @param  mixed|null    $data       Payload de error opcional.
     * @param  int           $statusCode Código HTTP (por defecto 400).
     * @param  Request|null  $request    Instancia de la petición para extraer params.
     * @return JsonResponse
     */
    public static function error(string $message, mixed $errors = null, int $statusCode = 400, ?Request $request = null): JsonResponse
    {
        $params = $request
            ? [
                'method'     => $request->method(),
                'parameters' => $request->all(),
            ]
            : null;

        return response()->json([
            'status'  => 'error',
            'errors'    => $errors,
            'message' => $message,
            'request' => $params,
        ], $statusCode);
    }
}
