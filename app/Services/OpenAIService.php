<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser; // Usando la librería PDF Parser

class OpenAIService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.openai.key');
        $this->apiUrl = "https://api.openai.com/v1/chat/completions";
    }

    public function uploadPDF($file)
    {
      
        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->getRealPath());
        $text = $pdf->getText();

      
        return $this->analyzeText($text);
    }

    public function analyzeText($text)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $this->apiKey,
        'Content-Type' => 'application/json',
    ])->post($this->apiUrl, [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'Eres un asistente experto en análisis de curriculums.'],
            ['role' => 'user', 'content' => "
Necesito que analices todo el texto que te voy a proporcionar y lo estructures en un formato JSON como el siguiente:

{
  \"referencias\": [
    {
      \"nombre_referencia\": \"Juan Pérez\",
      \"telefono_referencia\": \"123456789\",
      \"email_referencia\": \"juan.perez@email.com\",
      \"relacion\": \"Ex-jefe\",
      \"estado\": \"Activo\"
    }
  ],
  \"certificaciones\": [
    {
      \"nombre_certificacion\": \"Certificación en Java\",
      \"institucion_emisora\": \"Instituto Tecnológico\",
      \"tipo_certificacion\": \"Curso\",
      \"fecha_emision\": \"2020-05-15\",
      \"fecha_expiracion\": \"2023-05-15\",
      \"estado\": \"Válida\"
    }
  ],
  \"educacion\": [
    {
      \"institucion\": \"Universidad Nacional\",
      \"titulo\": \"Ingeniero de Sistemas\",
      \"nivel_educacion\": \"Universitario\",
      \"descripcion\": \"Estudios en el área de informática y sistemas\",
      \"fecha_inicio\": \"2015-01-01\",
      \"fecha_fin\": \"2019-12-31\",
      \"estado\": \"Completado\"
    }
  ],
  \"experiencia_laboral\": [
    {
      \"empresa\": \"Tech Solutions\",
      \"puesto\": \"Desarrollador Backend\",
      \"descripcion\": \"Desarrollo de APIs y soluciones en backend\",
      \"fecha_inicio\": \"2019-06-01\",
      \"fecha_fin\": \"2021-12-31\",
      \"estado\": \"Activo\"
    }
  ],
  \"habilidades\": [
    {
      \"habilidad\": \"PHP\",
      \"nivel\": \"Avanzado\",
      \"categoria\": \"Backend\",
      \"estado\": \"Activo\"
    }
  ],
  \"idiomas\": [
    {
      \"idioma\": \"Español\",
      \"nivel\": \"Nativo\",
      \"estado\": \"Activo\"
    },
    {
      \"idioma\": \"Inglés\",
      \"nivel\": \"Intermedio\",
      \"estado\": \"Activo\"
    }
  ]
}

Por favor, usa toda la información contenida en el currículum y asegúrate de estructurarla de esta forma. Si alguna categoría no tiene datos, déjala vacía (como en el ejemplo). tmb en la parte de mi tabal q dice certificaciones, ten 
en cuenta que puede ser un curso osea en la data q te envio un curso puede der tomado como una certificacion, analiza todo de forma inteligente y estructurada, gracias.
A continuación, te proporciono el texto del currículum:

$text
"],
        ]
    ]);

    return $response->json();
}

}
