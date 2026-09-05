<?php

namespace System;

use Throwable;
use ErrorException;

class ExceptionHandler
{
    /**
     * Mengambil alih sistem pelaporan error bawaan PHP
     */
    public static function register(): void
    {
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleError(int $level, string $message, string $file = '', int $line = 0): void
    {
        if (error_reporting() & $level) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function handleException(Throwable $exception): void
    {
        http_response_code(500);
        self::renderErrorScreen($exception);
    }

    /**
     * Layar Error Eksklusif berdesain Dark Mode
     */
    private static function renderErrorScreen(Throwable $exception): void
    {
        $message = $exception->getMessage();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $trace = $exception->getTraceAsString();

        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <title>🚨 DECOR System Error</title>
            <style>
                body { background-color: #0f172a; color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, sans-serif; padding: 3rem; line-height: 1.6; }
                .error-container { background: #1e293b; border-left: 5px solid #ef4444; padding: 2.5rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); max-width: 1000px; margin: 0 auto; }
                h1 { color: #ef4444; margin-top: 0; font-size: 2rem; display: flex; align-items: center; gap: 10px; }
                .message { font-size: 1.2rem; margin-bottom: 1.5rem; font-weight: 500; }
                .file-info { background: #0b1120; padding: 1.5rem; border-radius: 8px; color: #38bdf8; font-family: 'Courier New', monospace; font-size: 1.1rem; border: 1px solid rgba(255,255,255,0.1); }
                .line-number { color: #10b981; font-weight: bold; font-size: 1.3rem; }
                .trace { background: #0b1120; padding: 1.5rem; border-radius: 8px; color: #94a3b8; font-family: 'Courier New', monospace; font-size: 0.95rem; overflow-x: auto; white-space: pre-wrap; margin-top: 1rem; border: 1px solid rgba(255,255,255,0.1); }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <h1>System Exception</h1>
                <div class='message'>{$message}</div>
                <div class='file-info'>
                    📁 <strong>Lokasi File:</strong> {$file}<br><br>
                    🎯 <strong>Baris Kerusakan:</strong> <span class='line-number'>{$line}</span>
                </div>
                <h3 style='color: #94a3b8; margin-top: 2rem; margin-bottom: 0.5rem;'>Jejak Penelusuran (Stack Trace):</h3>
                <div class='trace'>{$trace}</div>
            </div>
        </body>
        </html>";
    }
}