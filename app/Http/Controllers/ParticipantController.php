<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Event;
use App\Models\ParticipantPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::with(['event', 'mainPhoto'])->get();
        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::where('status', 'activo')->get();
        return view('participants.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'nullable|string|unique:participants,dni',
            'course' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $participant = Participant::create($request->all());

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('participants', 'public');
            
            ParticipantPhoto::create([
                'participant_id' => $participant->id,
                'file_path' => $photoPath,
                'is_main' => true,
                'order' => 0
            ]);
        }

        return redirect()->route('participants.index')->with('success', 'Participante creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        $participant->load(['event', 'photos']);
        return view('participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        $events = Event::where('status', 'activo')->get();
        $participant->load('photos');
        return view('participants.edit', compact('participant', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dni' => 'nullable|string|unique:participants,dni,' . $participant->id,
            'course' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $participant->update($request->all());

        if ($request->hasFile('photo')) {
            if ($participant->mainPhoto) {
                Storage::disk('public')->delete($participant->mainPhoto->file_path);
                $participant->mainPhoto->delete();
            }

            $photoPath = $request->file('photo')->store('participants', 'public');
            
            ParticipantPhoto::create([
                'participant_id' => $participant->id,
                'file_path' => $photoPath,
                'is_main' => true,
                'order' => 0
            ]);
        }

        return redirect()->route('participants.index')->with('success', 'Participante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        foreach ($participant->photos as $photo) {
            Storage::disk('public')->delete($photo->file_path);
            $photo->delete();
        }

        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participante eliminado correctamente.');
    }
}