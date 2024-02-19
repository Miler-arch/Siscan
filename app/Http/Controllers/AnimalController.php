<?php

namespace App\Http\Controllers;

use App\Http\Requests\Animal\StoreRequest;
use App\Http\Requests\Animal\UpdateRequest;
use App\Models\Animal;
use App\Models\Client;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with('client', 'user')->get();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('animals.create', compact('clients'));
    }

    public function store(StoreRequest $request)
    {
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/animal_images/', $name);
        }

        auth()->user()->animals()->create([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'specie' => $request->specie,
            'race' => $request->race,
            'gender' => $request->gender,
            'fur' => $request->fur,
            'photo' => $name
        ]);

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Mascota creado con éxito');
        return redirect()->route('animals.index');
    }
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $clients = Client::all();
        $selectedClientId = $animal->client->id;
        return view('animals.edit', compact('animal', 'clients', 'selectedClientId'));
    }
    public function update(UpdateRequest $request, Animal $animal)
    {
        $name = $animal->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/animal_images/', $name);
        }

        $animal->update([
            'client_id' => $request->client_id,
            'name' => $request->name,
            'specie' => $request->specie,
            'race' => $request->race,
            'gender' => $request->gender,
            'fur' => $request->fur,
            'photo' => $name,
        ]);

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

    public function history_animal(Animal $animal)
    {
        $animal = Animal::with('client')->find($animal->id);
        $clinical_records = $animal->clinicalRecords;
        $pdf = \PDF::loadView('animals.history_animal', compact('animal', 'clinical_records'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('historia_clinica.pdf');
    }
}
