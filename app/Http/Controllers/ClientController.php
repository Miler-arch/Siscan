<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $idProgressive = Client::max('id') + 1;
        $code = str_pad($idProgressive, 7, '0', STR_PAD_LEFT);
        Client::create([
            'code' => $code,
            'name' => $request->name,
            'ci' => $request->ci,
            'expedition' => $request->expedition,
            'home' => $request->home,
            'street' => $request->street,
            'number' => $request->number,
            'phone' => $request->phone,
            'reference_phone' => $request->reference_phone,
        ]);
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente creado con éxito');
        return redirect()->route('clients.index');
    }
    public function show(Client $client)
    {

    }
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente actualizado con éxito');
        return redirect()->route('clients.index');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Cliente eliminado con éxito');
        return redirect()->route('clients.index');
    }
}
