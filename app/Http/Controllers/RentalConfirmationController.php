<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentalConfirmationController extends Controller
{
    private const TERMS_VERSION = 'v1.0';

    public function index(): View
    {
        return view('arrendatario', [
            'rental' => $this->rentalSummary(),
            'termsVersion' => self::TERMS_VERSION,
            'termsContent' => $this->termsContent(),
            'latestTransaction' => auth()->user()->transactions()->latest()->first(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'accept_terms' => ['accepted'],
        ], [
            'accept_terms.accepted' => 'Debes aceptar los terminos y condiciones antes de confirmar el alquiler.',
        ]);

        $rental = $this->rentalSummary();

        Transaction::create([
            'user_id' => $request->user()->id,
            'landlord_id' => $this->resolveLandlordId(),
            'item_name' => $rental['item_name'],
            'starts_at' => $rental['starts_at'],
            'ends_at' => $rental['ends_at'],
            'rental_days' => $rental['rental_days'],
            'total_amount' => $rental['total_amount'],
            'status' => 'pendiente',
            'terms_version' => self::TERMS_VERSION,
            'terms_snapshot' => $this->termsContent(),
            'accepted_terms_at' => now(),
        ]);

        return redirect()
            ->route('rentals.create')
            ->with('status', 'Alquiler confirmado y aceptacion registrada correctamente.');
    }

    private function rentalSummary(): array
    {
        return [
            'item_name' => 'Camara Canon EOS Rebel T7',
            'starts_at' => now()->toDateString(),
            'ends_at' => now()->addDays(3)->toDateString(),
            'rental_days' => 3,
            'total_amount' => 180000,
            'deposit_amount' => 250000,
            'delivery_city' => 'Bogota',
        ];
    }

    private function termsContent(): string
    {
        return implode("\n", [
            '1. El arrendatario se compromete a usar el articulo de forma responsable y conforme a su finalidad.',
            '2. El arrendatario debe devolver el articulo en la fecha acordada y en condiciones equivalentes a las de la entrega.',
            '3. Cualquier dano, perdida o uso indebido puede generar cobros adicionales y afectaciones sobre el deposito.',
            '4. El arrendatario debe reportar incidentes o fallas relevantes a la plataforma de manera inmediata.',
            '5. La confirmacion del alquiler deja constancia de que el arrendatario conoce sus responsabilidades.',
        ]);
    }

    private function resolveLandlordId(): ?int
    {
        return User::query()
            ->where('role', 'arrendador')
            ->orderBy('id')
            ->value('id');
    }
}
