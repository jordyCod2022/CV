<?php

namespace App\Http\Controllers;

use App\Models\TcnCandidato;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade as Countries;

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

       
                $uploadResponse = $this->openAIService->uploadPDF($file);
                $fileId = $uploadResponse['id'] ?? null;

                if (!$fileId) {
                    return back()->withErrors(['error' => 'Error al subir el archivo a OpenAI.']);
                }

               
                $analysisResponse = $this->openAIService->analyzePDF($fileId);
        
                dd($analysisResponse);
              
               
            }

       
            TcnCandidato::create($data);

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