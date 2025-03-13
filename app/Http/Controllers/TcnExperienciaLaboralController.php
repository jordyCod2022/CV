<?php

namespace App\Http\Controllers;

use App\Models\TcnExperienciaLaboral;
use Illuminate\Http\Request;

class TcnExperienciaLaboralController extends Controller
{
    public function index($candidatoId)
    {
        $experiencias = TcnExperienciaLaboral::where('candidato_id', $candidatoId)->get();
        return response()->json($experiencias);
    }

    // Crear una nueva experiencia laboral
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'empresa' => 'nullable|string|max:100',
            'puesto' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        $experiencia = TcnExperienciaLaboral::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($experiencia, 201);
    }

    // Actualizar una experiencia laboral
    public function update(Request $request, $id)
    {
        $experiencia = TcnExperienciaLaboral::findOrFail($id);

        $request->validate([
            'empresa' => 'sometimes|string|max:100',
            'puesto' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string',
            'fecha_inicio' => 'sometimes|date',
            'fecha_fin' => 'sometimes|date',
        ]);

        $experiencia->update($request->all());
        return response()->json($experiencia);
    }

    // Eliminar una experiencia laboral
    public function destroy($id)
    {
        $experiencia = TcnExperienciaLaboral::findOrFail($id);
        $experiencia->delete();
        return response()->json(null, 204);
    }
}
