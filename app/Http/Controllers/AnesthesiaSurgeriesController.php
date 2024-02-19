<?php

namespace App\Http\Controllers;

use App\Models\AnesthesiaSurgeries;
use App\Models\Animal;
use App\Models\Client;
use Illuminate\Http\Request;

class AnesthesiaSurgeriesController extends Controller
{
    public function index()
    {
        $anesthesiaAndSurgeries = AnesthesiaSurgeries::with('client', 'animal')->get();
        return view('anesthesia_surgeries.index', compact('anesthesiaAndSurgeries'));
    }
    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('anesthesia_surgeries.create', compact('clients', 'animals'));
    }
    public function store(Request $request)
    {
        AnesthesiaSurgeries::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Anestesia y cirugía creado con éxito');
        return redirect()->route('anesthesia_surgeries.index');
    }

    public function pdf(AnesthesiaSurgeries $anesthesiaSurgery)
    {
        $pdf = \PDF::loadView('anesthesia_surgeries.pdf', compact('anesthesiaSurgery'));
        return $pdf->stream('anesthesia_surgeries.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }
}
