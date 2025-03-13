<?php

namespace App\Http\Controllers;

use App\Models\TcnCertificacion;
use Illuminate\Http\Request;

class TcnCertificacionController extends Controller
{
    public function index($candidatoId)
    {
        $certificaciones = TcnCertificacion::where('candidato_id', $candidatoId)->get();
        return response()->json($certificaciones);
    }

    // Crear una nueva certificación
    public function store(Request $request, $candidatoId)
    {
        $request->validate([
            'nombre_certificacion' => 'nullable|string|max:100',
            'institucion_emisora' => 'nullable|string|max:100',
            'tipo_certificacion' => 'nullable|string',
            'fecha_emision' => 'nullable|date',
            'fecha_expiracion' => 'nullable|date',
        ]);

        $certificacion = TcnCertificacion::create([
            'candidato_id' => $candidatoId,
            ...$request->all(),
        ]);

        return response()->json($certificacion, 201);
    }

    // Actualizar una certificación
    public function update(Request $request, $id)
    {
        $certificacion = TcnCertificacion::findOrFail($id);

        $request->validate([
            'nombre_certificacion' => 'sometimes|string|max:100',
            'institucion_emisora' => 'sometimes|string|max:100',
            'tipo_certificacion' => 'sometimes|string',
            'fecha_emision' => 'sometimes|date',
            'fecha_expiracion' => 'sometimes|date',
        ]);

        $certificacion->update($request->all());
        return response()->json($certificacion);
    }

    // Eliminar una certificación
    public function destroy($id)
    {
        $certificacion = TcnCertificacion::findOrFail($id);
        $certificacion->delete();
        return response()->json(null, 204);
    }
}
