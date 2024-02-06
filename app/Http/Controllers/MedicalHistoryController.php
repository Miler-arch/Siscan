<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        $medicalHistories = MedicalHistory::all();
        return view('medical_histories.index', compact('medicalHistories'));
    }
    public function create()
    {
        $dogs = Dog::all();
        return view('medical_histories.create', compact('dogs'));
    }
    public function store(Request $request)
    {
        MedicalHistory::create($request->all());
        return redirect()->route('medical_histories.index');
    }
    public function show(MedicalHistory $medicalHistory)
    {
        //
    }
    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }
    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        //
    }
    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
