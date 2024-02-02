<?php

namespace App\Http\Controllers;

use App\Models\Crossing;
use App\Models\Dog;
use Illuminate\Http\Request;

class CrossingController extends Controller
{
    public function index()
    {
        $crossings = Crossing::all();
        return view('crossings.index', compact('crossings'));
    }
    public function create()
    {
        $dogs = Dog::all();
        return view('crossings.create', compact('dogs'));
    }
    public function store(Request $request)
    {
        $crossing = Crossing::create($request->all());
        flash()->addSuccess('Cruce registrado con éxito.', 'Muy bien!');
        return redirect()->route('crossings.index', compact('crossing'));
    }
    public function show(Crossing $crossing)
    {
        //
    }
    public function edit(Crossing $crossing)
    {
        //
    }
    public function update(Request $request, Crossing $crossing)
    {
        //
    }
    public function destroy($id)
    {
        $crossing = Crossing::find($id);
        $crossing->delete();
        flash()->addSuccess('Cruce eliminado con éxito.', 'Muy bien!');
        return redirect()->route('crossings.index');
    }
}
