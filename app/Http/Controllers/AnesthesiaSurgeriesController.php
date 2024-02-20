<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnesthesiaSurgeries\StoreRequest;
use App\Models\AnesthesiaSurgeries;
use App\Models\Animal;
use App\Models\Client;
use Illuminate\Http\Request;

class AnesthesiaSurgeriesController extends Controller
{
    public function index()
    {
        $anesthesiaSurgeries = AnesthesiaSurgeries::with('client', 'animal')->get();
        return view('anesthesia_surgeries.index', compact('anesthesiaSurgeries'));
    }
    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('anesthesia_surgeries.create', compact('clients', 'animals'));
    }
    public function store(StoreRequest $request)
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

    public function pdfAll()
    {
        $anesthesiaSurgeries = AnesthesiaSurgeries::with('client', 'animal')->get();
        $pdf = \PDF::loadView('anesthesia_surgeries.pdf_all', compact('anesthesiaSurgeries'));
        return $pdf->stream('anesthesia_surgeries.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $anesthesiaSurgeries = AnesthesiaSurgeries::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('anesthesia_surgeries.export', compact('anesthesiaSurgeries'));
        return $pdf->stream('anesthesia_surgeries.pdf');
    }

    public function edit(AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }
    public function update(Request $request, AnesthesiaSurgeries $anesthesiaSurgeries)
    {
        //
    }
    public function destroy(AnesthesiaSurgeries $anesthesiaSurgery)
    {
        $anesthesiaSurgery->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Anestesia y cirugía eliminado con éxito');
        return redirect()->route('anesthesia_surgeries.index');
    }
}
