<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Muestra la lista de mascotas
    public function index()
    {
        $pets = Pet::all();
        return view('pets', compact('pets'));
    }

    // Muestra el formulario para crear una nueva mascota
    public function create()
    {
        return view('createPet'); // Cambiado a 'pets.create'
    }

    // Almacena una nueva mascota en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'type' => 'nullable|string',
        ]);

        Pet::create($request->all());

        return redirect()->route('pet.index');
    }

    // Muestra el formulario para editar una mascota existente
    public function edit($id)
    {
        $pet = Pet::findOrFail($id); // Encuentra la mascota por su ID
        return view('editPet', compact('pet'));
    }

    // Actualiza los detalles de una mascota en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'type' => 'nullable|string',
        ]);

        $pet = Pet::findOrFail($id); // Encuentra la mascota por su ID
        $pet->update($request->all()); // Actualiza los detalles

        return redirect()->route('pet.index'); // Redirige a la lista de mascotas
    }

    // Elimina una mascota de la base de datos
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id); // Encuentra la mascota por su ID o devuelve error si no se encuentra
        $pet->delete(); // Elimina la mascota

        return redirect()->route('pet.index'); // Redirige de vuelta a la lista de mascotas
    }
    public function search(Request $request)
{
    $name = $request->input('name'); // Obtiene el nombre ingresado
    $pets = Pet::where('name', 'LIKE', "%$name%")->get(); // Busca mascotas cuyo nombre coincida parcialmente

    return view('searchPet', compact('pets')); // Devuelve la vista con los resultados
}
}
