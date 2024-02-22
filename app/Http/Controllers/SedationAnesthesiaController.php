<?php

namespace App\Http\Controllers;

use App\Http\Requests\SedationAnesthesia\StoreRequest;
use App\Http\Requests\SedationAnesthesia\UpdateRequest;
use App\Models\Animal;
use App\Models\Client;
use App\Models\SedationAnesthesia;
use Illuminate\Http\Request;

class SedationAnesthesiaController extends Controller
{
    public function index()
    {
        $sedationAnesthesias = SedationAnesthesia::with('client', 'animal')->get();
        return view('sedation_anesthesias.index', compact('sedationAnesthesias'));
    }
    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('sedation_anesthesias.create', compact('clients', 'animals'));
    }
    public function store(StoreRequest $request)
    {
        SedationAnesthesia::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Acta de sedación y anestesia creada con éxito.');
        return redirect()->route('sedation_anesthesias.index');
    }

    public function pdf(SedationAnesthesia $sedationAnesthesia)
    {
        $pdf = \PDF::loadView('sedation_anesthesias.pdf', compact('sedationAnesthesia'));
        return $pdf->stream('sedation_anesthesia.pdf');
    }

    public function pdfAll()
    {
        $sedationAnesthesias = SedationAnesthesia::with('client', 'animal')->get();
        $pdf = \PDF::loadView('sedation_anesthesias.pdf_all', compact('sedationAnesthesias'));
        return $pdf->stream('sedation_anesthesias.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $sedationAnesthesias = SedationAnesthesia::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('sedation_anesthesias.export', compact('sedationAnesthesias'));
        return $pdf->stream('sedation_anesthesias.pdf');
    }
    public function edit(SedationAnesthesia $sedationAnesthesia)
    {
        $clients = Client::all();
        $animals = Animal::all();
        $selectedClientId = $sedationAnesthesia->client_id;
        $selectedAnimalId = $sedationAnesthesia->animal_id;
        return view('sedation_anesthesias.edit', compact('sedationAnesthesia', 'clients', 'animals', 'selectedClientId', 'selectedAnimalId'));
    }
    public function update(UpdateRequest $request, SedationAnesthesia $sedationAnesthesia)
    {
        $sedationAnesthesia->update($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Acta de sedación y anestesia actualizada con éxito.');
        return redirect()->route('sedation_anesthesias.index');
    }

    public function destroy(SedationAnesthesia $sedationAnesthesia)
    {
        $sedationAnesthesia->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Acta de sedación y anestesia eliminada con éxito.');
        return redirect()->route('sedation_anesthesias.index');
    }
}
