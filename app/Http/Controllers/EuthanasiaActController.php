<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\EuthanasiaAct;
use Illuminate\Http\Request;

class EuthanasiaActController extends Controller
{

    public function index()
    {
        $euthanasia_acts = EuthanasiaAct::all();
        return view('euthanasia-acts.index', compact('euthanasia_acts'));
    }

    public function create()
    {
        $dogs = Dog::all();
        return view('euthanasia-acts.create', compact('dogs'));
    }

    public function store(Request $request)
    {
        EuthanasiaAct::create($request->all());
        flash()->addSuccess('Acta de eutanasia creada con éxito', 'Muy bien!');
        return redirect()->route('euthanasia_acts.index');
    }

    public function pdf(Request $request){
        $euthanasia_act = EuthanasiaAct::find($request->euthanasia_act);
        $pdf = \PDF::loadView('euthanasia-acts.pdf', compact('euthanasia_act'));
        return $pdf->stream('euthanasia_act.pdf');
    }

    public function show(EuthanasiaAct $euthanasiaAct)
    {
        //
    }

    public function edit(EuthanasiaAct $euthanasiaAct)
    {
        //
    }

    public function update(Request $request, EuthanasiaAct $euthanasiaAct)
    {
        //
    }

    public function destroy(EuthanasiaAct $euthanasiaAct)
    {
        //
    }
}
