<?php

namespace App\Http\Controllers;

use App\Models\TcnReferencia;
use Illuminate\Http\Request;

class TcnReferenciaController extends Controller
{
    public function index($candidatoId)
    {
        $referencias = TcnReferencia::where('candidato_id', $candidatoId)->get();
        return response()->json($referencias);
    }

    // Crear una nueva referencia
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'nombre_referencia' => 'nullable|string|max:100',
            'telefono_referencia' => 'nullable|string|max:20',
            'email_referencia' => 'nullable|email|max:100',
            'relacion' => 'nullable|string|max:100',
        ]);

        $referencia = TcnReferencia::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($referencia, 201);
    }

    // Actualizar una referencia
    public function update(Request $request, $id)
    {
        $referencia = TcnReferencia::findOrFail($id);

        $request->validate([
            'nombre_referencia' => 'sometimes|string|max:100',
            'telefono_referencia' => 'sometimes|string|max:20',
            'email_referencia' => 'sometimes|email|max:100',
            'relacion' => 'sometimes|string|max:100',
        ]);

        $referencia->update($request->all());
        return response()->json($referencia);
    }

    // Eliminar una referencia
    public function destroy($id)
    {
        $referencia = TcnReferencia::findOrFail($id);
        $referencia->delete();
        return response()->json(null, 204);
    }
}
