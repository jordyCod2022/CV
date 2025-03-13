<?php

namespace App\Http\Controllers;

use App\Models\TcnIdioma;
use Illuminate\Http\Request;

class TcnIdiomaController extends Controller
{
    public function index($candidatoId)
    {
        $idiomas = TcnIdioma::where('candidato_id', $candidatoId)->get();
        return response()->json($idiomas);
    }

    // Crear un nuevo idioma
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'idioma' => 'nullable|string|max:50',
            'nivel' => 'nullable|string',
        ]);

        $idioma = TcnIdioma::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($idioma, 201);
    }

    // Actualizar un idioma
    public function update(Request $request, $id)
    {
        $idioma = TcnIdioma::findOrFail($id);

        $request->validate([
            'idioma' => 'sometimes|string|max:50',
            'nivel' => 'sometimes|string',
        ]);

        $idioma->update($request->all());
        return response()->json($idioma);
    }

    // Eliminar un idioma
    public function destroy($id)
    {
        $idioma = TcnIdioma::findOrFail($id);
        $idioma->delete();
        return response()->json(null, 204);
    }
}
