<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Service;
use DateTime;

class AppointmentController extends Controller
{
    // Muestra la lista de citas
    public function index()
    {
        $appointments = Appointment::with(['pet', 'service'])->get(); 
        return view('Cita', compact('appointments')); 
    }


    public function create()
    {
        $pets = Pet::all();
        $services = Service::all(); 

        return view('createCita', compact('pets', 'services'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $appointment = Appointment::create($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.'); 
    }


    public function edit($id)
    {
        $appointment = Appointment::find($id); 

        if ($appointment->date && is_string($appointment->date)) {
            $appointment->date = new DateTime($appointment->date); 
        }
        if ($appointment->time && is_string($appointment->time)) {
            $appointment->time = new DateTime($appointment->time);
        }

        $pets = Pet::all(); 
        $services = Service::all(); 
        $appointment = Appointment::find($id); 

        return view('editCita', compact('appointment', 'pets', 'services'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $appointments = Appointment::findOrFail($id); 
        $appointments->update($request->all()); 

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }


    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id); 
        $appointment->delete(); 

        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.'); 
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        

        $appointments = Appointment::whereHas('pet', function($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })->orWhereHas('service', function($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })->get();

        return view('searchCita', compact('appointments')); 
    }
}
