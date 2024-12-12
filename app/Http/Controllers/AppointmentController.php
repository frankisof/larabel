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
        $appointments = Appointment::with(['pet', 'service'])->get(); // Obtiene todas las citas con sus relaciones
        return view('Cita', compact('appointments')); // Devuelve la vista con las citas
    }

    // Muestra el formulario para crear una nueva cita
    public function create()
    {
        $pets = Pet::all(); // Obtiene todas las mascotas
        $services = Service::all(); // Obtiene todos los servicios

        return view('createCita', compact('pets', 'services'));
    }

    // Almacena una nueva cita en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $appointment = Appointment::create($request->all()); // Crea una nueva cita

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.'); // Redirige a la lista de citas
    }

    // Muestra el formulario para editar una cita existente
    public function edit($id)
    {
        $appointment = Appointment::find($id); // Obtén la cita por ID

        if ($appointment->date && is_string($appointment->date)) {
            $appointment->date = new DateTime($appointment->date); // Convierte la cadena a DateTime
        }
        if ($appointment->time && is_string($appointment->time)) {
            $appointment->time = new DateTime($appointment->time); // Convierte la cadena a DateTime
        }

        $pets = Pet::all(); // Obtiene todas las mascotas
        $services = Service::all(); // Obtiene todos los servicios
        $appointment = Appointment::find($id); 

        return view('editCita', compact('appointment', 'pets', 'services'));
    }

    // Actualiza los detalles de una cita en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $appointments = Appointment::findOrFail($id); // Encuentra la cita por su ID
        $appointments->update($request->all()); // Actualiza los detalles de la cita

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    // Elimina una cita de la base de datos
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id); // Encuentra la cita por su ID
        $appointment->delete(); // Elimina la cita

        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.'); // Redirige a la lista de citas
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Obtiene la palabra clave de búsqueda
        
        // Filtra las citas según el nombre de la mascota o el servicio
        $appointments = Appointment::whereHas('pet', function($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })->orWhereHas('service', function($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })->get();

        return view('searchCita', compact('appointments')); // Devuelve la vista con los resultados
    }
}
