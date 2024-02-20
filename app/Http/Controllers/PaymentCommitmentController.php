<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCommitment\StoreRequest;
use App\Models\Client;
use App\Models\PaymentCommitment;
use Illuminate\Http\Request;

class PaymentCommitmentController extends Controller
{

    public function index()
    {
        $payment_commitments = PaymentCommitment::with('client')->get();
        return view('payment_commitments.index', compact('payment_commitments'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('payment_commitments.create', compact('clients'));
    }

    public function store(StoreRequest $request)
    {
        PaymentCommitment::create($request->all());
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Compromiso de pago creado con éxito');
        return redirect()->route('payment_commitments.index');
    }

    public function pdf(PaymentCommitment $payment_commitment)
    {
        $numeroALetras = new \Luecano\NumeroALetras\NumeroALetras();
        $numero = $numeroALetras->toWords($payment_commitment->amount);

        $pdf = \PDF::loadView('payment_commitments.pdf', compact('payment_commitment', 'numero'));
        return $pdf->stream('payment_commitment.pdf');
    }

    public function pdfAll()
    {
        $payment_commitments = PaymentCommitment::with('client')->get();
        $pdf = \PDF::loadView('payment_commitments.pdf_all', compact('payment_commitments'));
        return $pdf->stream('payment_commitments.pdf');
    }

    public function export(Request $request)
    {
        $fecha_inicio = \Carbon\Carbon::parse($request->initial_date)->startOfDay();
        $fecha_fin = \Carbon\Carbon::parse($request->final_date)->endOfDay();
        $payment_commitments = PaymentCommitment::with('client')
            ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
            ->get();
        $pdf = \PDF::loadView('payment_commitments.export', compact('payment_commitments'));
        return $pdf->stream('payment_commitments.pdf');
    }   
    public function edit(PaymentCommitment $paymentCommitment)
    {
        //
    }
    public function update(Request $request, PaymentCommitment $paymentCommitment)
    {
        //
    }

    public function destroy(PaymentCommitment $paymentCommitment)
    {
        $paymentCommitment->delete();
        notyf()->duration(2000)->position('y', 'top')->addSuccess('Compromiso de pago eliminado con éxito');
        return redirect()->route('payment_commitments.index');
    }
}
