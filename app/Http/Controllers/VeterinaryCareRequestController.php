<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\VeterinaryCareRequest;
use Illuminate\Http\Request;

class VeterinaryCareRequestController extends Controller
{
    public function index()
    {
        $attentions = VeterinaryCareRequest::all();
        return view('attentions.index', compact('attentions'));
    }

    public function create()
    {
        $dogs = Dog::all();
        return view('attentions.create', compact('dogs'));
    }

    public function store(Request $request)
    {
        $attention = VeterinaryCareRequest::create($request->all());
        flash()->addSuccess('Solicitud de atención veterinaria registrada con éxito.', 'Muy bien!');
        return redirect()->route('attentions.index', compact('attention'));
    }

    public function pdf(VeterinaryCareRequest $attentions)
    {
        $attentions = VeterinaryCareRequest::all();
        $pdf = \PDF::loadView('attentions.pdf', compact('attentions'));
        return $pdf->stream('attentions.pdf');
    }

    public function show(VeterinaryCareRequest $veterinaryCareRequest)
    {
        //
    }

    public function edit(VeterinaryCareRequest $veterinaryCareRequest)
    {
        //
    }

    public function update(Request $request, VeterinaryCareRequest $veterinaryCareRequest)
    {
        //
    }
    public function destroy($id)
    {
        $veterinaryCareRequest = VeterinaryCareRequest::find($id);
        $veterinaryCareRequest->delete();
        flash()->addSuccess('Solicitud de atención veterinaria eliminada con éxito.', 'Muy bien!');
        return redirect()->route('attentions.index');
    }
}
