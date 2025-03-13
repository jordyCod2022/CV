<?php

namespace App\Http\Controllers;

use App\Models\TcnHabilidad;
use Illuminate\Http\Request;

class TcnHabilidadController extends Controller
{
    public function index($candidatoId)
    {
        $habilidades = TcnHabilidad::where('candidato_id', $candidatoId)->get();
        return response()->json($habilidades);
    }

    // Crear una nueva habilidad
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'habilidad' => 'nullable|string|max:100',
            'nivel' => 'nullable|string',
            'categoria' => 'nullable|string|max:100',
        ]);

        $habilidad = TcnHabilidad::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($habilidad, 201);
    }

    // Actualizar una habilidad
    public function update(Request $request, $id)
    {
        $habilidad = TcnHabilidad::findOrFail($id);

        $request->validate([
            'habilidad' => 'sometimes|string|max:100',
            'nivel' => 'sometimes|string',
            'categoria' => 'sometimes|string|max:100',
        ]);

        $habilidad->update($request->all());
        return response()->json($habilidad);
    }

    // Eliminar una habilidad
    public function destroy($id)
    {
        $habilidad = TcnHabilidad::findOrFail($id);
        $habilidad->delete();
        return response()->json(null, 204);
    }
}
