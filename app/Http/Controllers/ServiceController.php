<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services = Service::all(); 
        return view('Service', compact('services'));
    }

 
    public function create()
    {
        return view('createService'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($request->all()); 

        return redirect()->route('service.index'); 
    }

    
    public function edit($id)
    {
        $service = Service::findOrFail($id); 
        return view('editService', compact('service'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all()); 

        return redirect()->route('service.index');
    }

    
    public function destroy($id)
    {
        $service = Service::findOrFail($id); 
        $service->delete(); 

        return redirect()->route('service.index'); 
    }

    
    public function search(Request $request)
    {
        $name = $request->input('name');
        $services = Service::where('name', 'LIKE', "%$name%")->get(); 

        return view('searchService', compact('services')); 
    }
}
