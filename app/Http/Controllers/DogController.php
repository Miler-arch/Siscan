<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::with('user')->get();
        return view('dogs.index', compact('dogs'));
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        auth()->user()->dogs()->create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Can creado con éxito');
        return redirect()->route('dogs.index');
    }

    public function show(Dog $dog)
    {
        //
    }

    public function edit(Dog $dog)
    {
        //
    }

    public function update(Request $request, Dog $dog)
    {
        //
    }

    public function destroy(Dog $dog)
    {
        $dog->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Can eliminado con éxito');
        return redirect()->route('dogs.index');
    }
}
