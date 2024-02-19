<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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

    public function show(SedationAnesthesia $sedationAnesthesia)
    {
        //
    }
    public function edit(SedationAnesthesia $sedationAnesthesia)
    {
        //
    }
    public function update(Request $request, SedationAnesthesia $sedationAnesthesia)
    {
        //
    }

    public function destroy(SedationAnesthesia $sedationAnesthesia)
    {
        //
    }
}
