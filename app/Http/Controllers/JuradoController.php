<?php

namespace App\Http\Controllers;

use App\Models\EventJuror;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class JuradoController extends Controller
{
    /**
     * Mostrar lista de jurados
     */
    public function index()
    {
        $jurados = EventJuror::with(['event', 'juror'])->get();
        return view('jurados.index', compact('jurados'));
    }

    /**
     * Mostrar formulario para crear nuevo jurado
     */
    public function create()
    {
        $eventos = Event::all();
        $usuarios = User::where('rol', 'JURADO')->get();
        return view('jurados.create', compact('eventos', 'usuarios'));
    }

    /**
     * Guardar nuevo jurado
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'juror_user_id' => 'required|exists:users,id'
        ]);

        // Verificar si ya existe
        $existe = EventJuror::where('event_id', $request->event_id)
            ->where('juror_user_id', $request->juror_user_id)
            ->exists();

        if ($existe) {
            return redirect()->back()->with('error', 'Este jurado ya está asignado a este evento.');
        }

        EventJuror::create($request->all());

        return redirect()->route('jurados.index')->with('success', 'Jurado asignado correctamente.');
    }

    /**
     * Mostrar detalles de un jurado
     */
    public function show(EventJuror $jurado)
    {
        return view('jurados.show', compact('jurado'));
    }

    /**
     * Mostrar formulario para editar jurado
     */
    public function edit(EventJuror $jurado)
    {
        $eventos = Event::all();
        $usuarios = User::where('rol', 'JURADO')->get();
        return view('jurados.edit', compact('jurado', 'eventos', 'usuarios'));
    }

    /**
     * Actualizar jurado
     */
    public function update(Request $request, EventJuror $jurado)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'juror_user_id' => 'required|exists:users,id'
        ]);

        $jurado->update($request->all());

        return redirect()->route('jurados.index')->with('success', 'Jurado actualizado correctamente.');
    }

    /**
     * Eliminar jurado
     */
    public function destroy(EventJuror $jurado)
    {
        $jurado->delete();
        return redirect()->route('jurados.index')->with('success', 'Jurado eliminado correctamente.');
    }
}