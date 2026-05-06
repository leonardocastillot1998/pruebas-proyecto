<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandlordRentalRequestController extends Controller
{
    public function index(Request $request): View
    {
        return view('arrendador-solicitudes', [
            'requests' => $request->user()
                ->receivedTransactions()
                ->with('user')
                ->latest()
                ->get(),
        ]);
    }

    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        abort_unless((int) $transaction->landlord_id === (int) $request->user()->id, 404);

        $validated = $request->validate([
            'decision' => ['required', 'in:aprobada,rechazada'],
        ]);

        if ($transaction->status === 'pendiente') {
            $transaction->update([
                'status' => $validated['decision'],
            ]);
        }

        return redirect()
            ->route('landlord.requests.index')
            ->with('status', 'La solicitud fue actualizada correctamente.');
    }
}
