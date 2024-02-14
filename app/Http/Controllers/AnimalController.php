<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('animals.create', compact('clients'));
    }

    public function store(Request $request)
    {
        auth()->user()->animals()->create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Mascota creado con éxito');
        return redirect()->route('animals.index');
    }
    public function show(Animal $animal)
    {
        //
    }

    public function edit(Animal $animal)
    {
        $clients = Client::all();
        $selectedClientId = $animal->client->id;
        return view('animals.edit', compact('animal', 'clients', 'selectedClientId'));
    }
    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Mascota actualizado con éxito');
        return redirect()->route('animals.index');
    }
    public function destroy(Animal $animal)
    {
        $animal->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Mascota eliminado con éxito');
        return redirect()->route('animals.index');
    }

    public function pdf()
    {
        $animals = Animal::all();
        $pdf = \PDF::loadView('animals.pdf', compact('animals'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('animals.pdf');
    }
}
