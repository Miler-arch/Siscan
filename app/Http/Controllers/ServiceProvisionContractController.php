<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceProvisioContract\StoreRequest;
use App\Models\Animal;
use App\Models\Client;
use App\Models\ServiceProvisionContract;
use Illuminate\Http\Request;

class ServiceProvisionContractController extends Controller
{
    public function index()
    {
        $service_provision_contracts = ServiceProvisionContract::with('client')->get();
        return view('service_provision_contracts.index', compact('service_provision_contracts'));
    }

    public function create()
    {
        $clients = Client::all();
        $animals = Animal::all();
        return view('service_provision_contracts.create', compact('clients', 'animals'));
    }

    public function store(StoreRequest $request)
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

    public function pdfAll()
    {
        $service_provision_contracts = ServiceProvisionContract::with('client', 'animal')->get();
        $pdf = \PDF::loadView('service_provision_contracts.pdf_all', compact('service_provision_contracts'));
        return $pdf->stream('service_provision_contracts.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $service_provision_contracts = ServiceProvisionContract::with('client', 'animal')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('service_provision_contracts.export', compact('service_provision_contracts'));
        return $pdf->stream('service_provision_contracts.pdf');
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
        $serviceProvisionContract->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Contrato de prestación de servicios eliminado con éxito');
        return redirect()->route('service_provision_contracts.index');
    }
}
