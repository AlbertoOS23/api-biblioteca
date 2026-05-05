<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index() {
        return response()-> json(Libro::all());
    }

    public function show($id) {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' =>'Libro no encontrado'], 404);
        }

        return response()->json($libro);
    }
    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $libro = Libro::create($request->all());

        return response()->json($libro,201);
    }

    public function destroy($id) {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
    
        }

        $libro->delete();

        return response()->json(['message' => 'Libro eliminado satisfactoriamente']);
    }
}

