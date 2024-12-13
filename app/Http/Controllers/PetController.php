<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function index()
    {
        $pets = Pet::all();
        return view('pets', compact('pets'));
    }


    public function create()
    {
        return view('createPet'); 
    }

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


    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('editPet', compact('pet'));
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'type' => 'nullable|string',
        ]);

        $pet = Pet::findOrFail($id); 
        $pet->update($request->all()); 

        return redirect()->route('pet.index');
    }


    public function destroy($id)
    {
        $pet = Pet::findOrFail($id); 
        $pet->delete(); 

        return redirect()->route('pet.index');
    }
    public function search(Request $request)
{
    $name = $request->input('name'); 
    $pets = Pet::where('name', 'LIKE', "%$name%")->get(); 

    return view('searchPet', compact('pets'));
}
}
