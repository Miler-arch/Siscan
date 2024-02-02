<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Jealousy;
use Illuminate\Http\Request;

class JealousyController extends Controller
{
    public function index()
    {
        $jealousies = Jealousy::with('dog')->get();

        return view('jealousies.index', compact('jealousies'));
    }

    public function create()
    {
        $dogs = Dog::all();
        return view('jealousies.create', compact('dogs'));
    }

    public function store(Request $request)
    {
        $jealousie = Jealousy::create($request->all());
        flash()->addSuccess('Celo registrado con éxito.', 'Muy bien!');
        return redirect()->route('jealousies.index', compact('jealousie'));
    }

    public function show(Jealousy $jealousy)
    {
        //
    }

    public function edit(Jealousy $jealousy)
    {
        //
    }

    public function update(Request $request, Jealousy $jealousy)
    {
        //
    }

    public function destroy($id)
    {
        $jealousy = Jealousy::find($id);
        $jealousy->delete();
        flash()->addSuccess('Celo eliminado con éxito.', 'Muy bien!');
        return redirect()->route('jealousies.index');
    }
}
