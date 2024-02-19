<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use App\Models\ClinicalRecord;
use Illuminate\Http\Request;

class ClinicalRecordController extends Controller
{
    public function index()
    {
        $clinical_records = ClinicalRecord::with('client', 'user')->get();
        return view('clinical_records.index', compact('clinical_records'));
    }

    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('clinical_records.create', compact('clients', 'animals'));
    }

    public function store(Request $request)
    {
        auth()->user()->clinicalRecords()->create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Registro clínico creado con éxito');
        return redirect()->route('clinical_records.index');
    }

    public function pdf(ClinicalRecord $clinical_records)
    {
        $pdf = \PDF::loadView('clinical_records.pdf', compact('clinical_records'));
        $pdf = $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('clinical_record.pdf');
    }

    public function show(ClinicalRecord $clinicalRecord)
    {
        //
    }

    public function edit(ClinicalRecord $clinicalRecord)
    {
        //
    }

    public function update(Request $request, ClinicalRecord $clinicalRecord)
    {
        //
    }

    public function destroy(ClinicalRecord $clinicalRecord)
    {
        $clinicalRecord->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Registro clínico eliminado con éxito');
        return redirect()->route('clinical_records.index');
    }
}
