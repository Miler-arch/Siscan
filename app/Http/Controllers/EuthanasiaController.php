<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use App\Models\Euthanasia;
use Illuminate\Http\Request;

class EuthanasiaController extends Controller
{
    public function index()
    {
        $euthanasias = Euthanasia::all();
        return view('euthanasias.index', compact('euthanasias'));
    }
    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('euthanasias.create', compact('clients', 'animals'));
    }
    public function store(Request $request)
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
    public function show(Euthanasia $euthanasia)
    {
        //
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
        //
    }
}
