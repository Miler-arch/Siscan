<?php

namespace App\Http\Controllers;

use App\Http\Requests\Euthanasia\StoreRequest;
use App\Models\Animal;
use App\Models\Client;
use App\Models\Euthanasia;
use Illuminate\Http\Request;

class EuthanasiaController extends Controller
{
    public function index()
    {
        $euthanasias = Euthanasia::with('client', 'animal')->get();
        return view('euthanasias.index', compact('euthanasias'));
    }
    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('euthanasias.create', compact('clients', 'animals'));
    }
    public function store(StoreRequest $request)
    {
        Euthanasia::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Eutanasia registrado con éxito');
        return redirect()->route('euthanasias.index');
    }
    public function pdf(Euthanasia $euthanasia)
    {
        $pdf = \PDF::loadView('euthanasias.pdf', compact('euthanasia'));
        return $pdf->stream('euthanasia.pdf');
    }

    public function pdfAll()
    {
        $euthanasias = Euthanasia::with('client', 'animal')->get();
        $pdf = \PDF::loadView('euthanasias.pdf_all', compact('euthanasias'));
        return $pdf->stream('euthanasias.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $euthanasias = Euthanasia::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('euthanasias.export', compact('euthanasias'));
        return $pdf->stream('euthanasias.pdf');
    }
    public function edit(Euthanasia $euthanasia)
    {
        //
    }
    public function update(Request $request, Euthanasia $euthanasia)
    {
        //
    }
    public function destroy(Euthanasia $euthanasia)
    {
        $euthanasia->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Eutanasia eliminado con éxito');
        return redirect()->route('euthanasias.index');
    }
}
