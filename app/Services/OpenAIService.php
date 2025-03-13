<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class OpenAIService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.openai.key');
        $this->apiUrl = "https://api.openai.com/v1/files";
    }

    public function uploadPDF($file)
    {
        // Subir archivo PDF a OpenAI
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->attach(
            'file', file_get_contents($file->getRealPath()), $file->getClientOriginalName()
        )->post($this->apiUrl, [
            'purpose' => 'assistants',
        ]);

        return $response->json();
    }

    public function analyzePDF($fileId)
    {
        // Enviar solicitud a OpenAI para analizar el archivo
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post("https://api.openai.com/v1/chat/completions", [
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'Eres un asistente experto en análisis de currículums.'],
                ['role' => 'user', 'content' => 'Analiza el archivo y resume la información relevante.'],
            ],
            'file_ids' => [$fileId],
        ]);

        return $response->json();
    }
}
