<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dog\StoreRequest;
use App\Http\Requests\Dog\UpdateRequest;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::with('user')->orderBy('id', 'desc')->get();
        return view('dogs.index', compact('dogs'));
    }

    public function create()
    {
        return view('dogs.create');
    }

    public function store(StoreRequest $request)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
        }
        auth()->user()->dogs()->create($request->all()+[
            'photo' => $image_name,
        ]);

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Can creado con éxito');
        return redirect()->route('dogs.index');
    }

    public function show(Dog $dog)
    {
        return view('dogs.show', compact('dog'));
    }

    public function edit(Dog $dog)
    {
        return view('dogs.edit', compact('dog'));
    }

    public function update(UpdateRequest $request, Dog $dog)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
        }
        $dog->update($request->all()+[
            'photo' => $image_name,
        ]);

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Can actualizado con éxito');
        return redirect()->route('dogs.index');
    }

    public function destroy(Dog $dog)
    {
        $dog->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Can eliminado con éxito');
        return redirect()->route('dogs.index');
    }
}
