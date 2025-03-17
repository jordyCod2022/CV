<?php

namespace App\Http\Controllers;

use App\Models\TcnCandidato;
use App\Models\TcnCertificacion;
use App\Models\TcnEducacion;
use App\Models\TcnExperienciaLaboral;
use App\Models\TcnHabilidad;
use App\Models\TcnIdioma;
use App\Models\TcnReferencia;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade as Countries;
use Illuminate\Support\Facades\DB;

class TcnCandidatoController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    public function index()
    {
        $candidatos = TcnCandidato::all();
        return response()->json($candidatos);
    }


    public function store(Request $request)
    {
        try {

            DB::beginTransaction(); // Iniciar transacción
            // Validación
            $validated = $request->validate([
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'email' => 'required|email|unique:tcn_candidatos,email',
                'telefono' => 'required|string|max:20',
                'direccion' => 'required|string|max:255',
                'ciudad' => 'required|string|max:100',
                'pais' => 'required|string|max:100',
                'nacionalidad' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|date',
                'genero' => 'required|string|in:M,F,O',
                'estado_civil' => 'required|string|in:soltero,casado,divorciado,viudo',
                'linkedin' => 'nullable|url|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'curriculum' => 'required|file|mimes:pdf|max:2048',
            ]);
    
         
            $data = $request->except(['foto', 'curriculum']);
    
         
            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('fotos', 'public');
            }
    
           
            if ($request->hasFile('curriculum')) {
                $file = $request->file('curriculum');
                
                // Aquí extraemos el texto del PDF
                $pdfParser = new \Smalot\PdfParser\Parser();
                $pdf = $pdfParser->parseFile($file->getRealPath());
                $text = $pdf->getText();  // Extraer el texto
    
             
                $analysisResponse = $this->openAIService->analyzeText($text); // Asumiendo que has cambiado el servicio
    
            
                $analysisContent = $analysisResponse['choices'][0]['message']['content'] ?? 'Análisis no disponible';
    
             
                $data['curriculum_analysis'] = $analysisContent;
    
             
               
            }
    
            $candidato = TcnCandidato::create($data);

             // Guardar referencias
        foreach ($analysisContent['referencias'] ?? [] as $ref) {
            TcnReferencia::create(array_merge($ref, ['candidato_id' => $candidato->id]));
        }

        // Guardar certificaciones
        foreach ($analysisContent['certificaciones'] ?? [] as $cert) {
            TcnCertificacion::create(array_merge($cert, ['candidato_id' => $candidato->id]));
        }

        // Guardar educación
        foreach ($analysisContent['educacion'] ?? [] as $edu) {
            TcnEducacion::create(array_merge($edu, ['candidato_id' => $candidato->id]));
        }

        // Guardar experiencia laboral
        foreach ($analysisContent['experiencia_laboral'] ?? [] as $exp) {
            TcnExperienciaLaboral::create(array_merge($exp, ['candidato_id' => $candidato->id]));
        }

        // Guardar habilidades
        foreach ($analysisContent['habilidades'] ?? [] as $hab) {
            TcnHabilidad::create(array_merge($hab, ['candidato_id' => $candidato->id]));
        }

        // Guardar idiomas
        foreach ($analysisContent['idiomas'] ?? [] as $idioma) {
            TcnIdioma::create(array_merge($idioma, ['candidato_id' => $candidato->id]));
        }

        DB::commit(); // Confirmar transacción
    
            
            return redirect()->route('informacion')->with('success', 'Gracias por registrarte. Hemos recibido tu información correctamente.');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
          
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
         
            return back()->withErrors(['error' => 'Ha ocurrido un error al procesar tu registro.'])->withInput();
        }
    }
    



    public function show($id)
    {
        $candidato = TcnCandidato::findOrFail($id);
        return response()->json($candidato);
    }

    // Actualizar un candidato
    public function update(Request $request, $id)
    {
        $candidato = TcnCandidato::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:tcn_candidatos,email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'pais' => 'required|string|max:100',
            'nacionalidad' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|in:M,F,O',
            'estado_civil' => 'required|string|in:soltero,casado,divorciado,viudo',
            'linkedin' => 'nullable|url|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'curriculum' => 'required|file|mimes:pdf|max:2048',
        ]);
        

        $candidato->update($request->all());
        return response()->json($candidato);
    }

    // Eliminar un candidato
    public function destroy($id)
    {
        $candidato = TcnCandidato::findOrFail($id);
        $candidato->delete();
        return response()->json(null, 204);
    }

    public function create()
    {
        $paises = Countries::getList('es');
        return view('registrer', compact('paises')); // Muestra la vista create.blade.php
    }
}