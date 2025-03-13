<?php

namespace App\Http\Controllers;

use App\Models\TcnEducacion;
use Illuminate\Http\Request;

class TcnEducacionController extends Controller
{
    public function index($candidatoId)
    {
        $educaciones = TcnEducacion::where('candidato_id', $candidatoId)->get();
        return response()->json($educaciones);
    }

    // Crear una nueva educación
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'institucion' => 'nullable|string|max:100',
            'titulo' => 'nullable|string|max:100',
            'nivel_educacion' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        $educacion = TcnEducacion::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($educacion, 201);
    }

    // Actualizar una educación
    public function update(Request $request, $id)
    {
        $educacion = TcnEducacion::findOrFail($id);

        $request->validate([
            'institucion' => 'sometimes|string|max:100',
            'titulo' => 'sometimes|string|max:100',
            'nivel_educacion' => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'fecha_inicio' => 'sometimes|date',
            'fecha_fin' => 'sometimes|date',
        ]);

        $educacion->update($request->all());
        return response()->json($educacion);
    }

    // Eliminar una educación
    public function destroy($id)
    {
        $educacion = TcnEducacion::findOrFail($id);
        $educacion->delete();
        return response()->json(null, 204);
    }
}
