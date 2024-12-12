<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Muestra la lista de servicios
    public function index()
    {
        $services = Service::all(); // Obtiene todos los servicios
        return view('Service', compact('services')); // Devuelve la vista con los servicios
    }

    // Muestra el formulario para crear un nuevo servicio
    public function create()
    {
        return view('createService'); // Devuelve la vista para crear un servicio
    }

    // Almacena un nuevo servicio en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($request->all()); // Crea un nuevo servicio

        return redirect()->route('service.index'); // Redirige a la lista de servicios
    }

    // Muestra el formulario para editar un servicio existente
    public function edit($id)
    {
        $service = Service::findOrFail($id); // Encuentra el servicio por su ID
        return view('editService', compact('service')); // Devuelve la vista de edición
    }

    // Actualiza los detalles de un servicio en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id); // Encuentra el servicio por su ID
        $service->update($request->all()); // Actualiza los detalles del servicio

        return redirect()->route('service.index'); // Redirige a la lista de servicios
    }

    // Elimina un servicio de la base de datos
    public function destroy($id)
    {
        $service = Service::findOrFail($id); // Encuentra el servicio por su ID
        $service->delete(); // Elimina el servicio

        return redirect()->route('service.index'); // Redirige a la lista de servicios
    }

    // Busca servicios por nombre
    public function search(Request $request)
    {
        $name = $request->input('name'); // Obtiene el nombre ingresado
        $services = Service::where('name', 'LIKE', "%$name%")->get(); // Busca servicios cuyo nombre coincida parcialmente

        return view('searchService', compact('services')); // Devuelve la vista con los resultados
    }
}
