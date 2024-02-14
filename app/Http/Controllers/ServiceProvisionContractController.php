<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use App\Models\ServiceProvisionContract;
use Illuminate\Http\Request;

class ServiceProvisionContractController extends Controller
{
    public function index()
    {
        $service_provision_contracts = ServiceProvisionContract::all();
        return view('service_provision_contracts.index', compact('service_provision_contracts'));
    }

    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('service_provision_contracts.create', compact('clients', 'animals'));
    }

    public function store(Request $request)
    {
        ServiceProvisionContract::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Contrato de prestación de servicios creado con éxito');
        return redirect()->route('service_provision_contracts.index');
    }

    public function pdf(ServiceProvisionContract $service_provision_contract)
    {
        $numeroALetras = new \Luecano\NumeroALetras\NumeroALetras();
        $numero = $numeroALetras->toWords($service_provision_contract->amount);

        $pdf = \PDF::loadView('service_provision_contracts.pdf', compact('service_provision_contract', 'numero'));
        return $pdf->stream('service_provision_contract.pdf');
    }

    public function show(ServiceProvisionContract $serviceProvisionContract)
    {
        //
    }

    public function edit(ServiceProvisionContract $serviceProvisionContract)
    {
        //
    }
    public function update(Request $request, ServiceProvisionContract $serviceProvisionContract)
    {
        //
    }

    public function destroy(ServiceProvisionContract $serviceProvisionContract)
    {
        //
    }
}
