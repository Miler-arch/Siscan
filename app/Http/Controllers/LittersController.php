<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Litters;
use Illuminate\Http\Request;

class LittersController extends Controller
{
    public function index()
    {
        $litters = Litters::all();
        return view('litters.index', compact('litters'));
    }
    public function create()
    {
        $dogs = Dog::all();
        return view('litters.create', compact('dogs'));
    }
    public function store(Request $request)
    {
        $litter = Litters::create($request->all());
        flash()->addSuccess('Camada registrada con éxito.', 'Muy bien!');
        return redirect()->route('litters.index', compact('litter'));
    }
    public function show(Litters $litters)
    {

    }
    public function edit(Litters $litters)
    {
    }
    public function update(Request $request, Litters $litters)
    {

    }
    public function destroy($id)
    {
        $litters = Litters::find($id);
        $litters->delete();
        flash()->addSuccess('Camada eliminada con éxito.', 'Muy bien!');
        return redirect()->route('litters.index');
    }

}
