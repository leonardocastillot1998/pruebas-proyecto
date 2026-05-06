<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Tests\TestCase;

class LandlordRentalRequestTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ValidateCsrfToken::class);
    }

    public function test_arrendador_can_view_received_requests(): void
    {
        $landlord = User::factory()->create([
            'role' => 'arrendador',
            'name' => 'Laura Arrendadora',
        ]);

        $tenant = User::factory()->create([
            'role' => 'arrendatario',
            'name' => 'Carlos Arrendatario',
            'document' => '123456789',
            'phone' => '3001234567',
        ]);

        Transaction::create([
            'user_id' => $tenant->id,
            'landlord_id' => $landlord->id,
            'item_name' => 'Camara Canon EOS Rebel T7',
            'starts_at' => now()->toDateString(),
            'ends_at' => now()->addDays(3)->toDateString(),
            'rental_days' => 3,
            'total_amount' => 180000,
            'status' => 'pendiente',
            'terms_version' => 'v1.0',
            'terms_snapshot' => 'Terminos',
            'accepted_terms_at' => now(),
        ]);

        $response = $this->actingAs($landlord)->get(route('landlord.requests.index'));

        $response
            ->assertOk()
            ->assertSee('Solicitudes recibidas')
            ->assertSee('Carlos Arrendatario')
            ->assertSee('123456789')
            ->assertSee('3001234567')
            ->assertSee('Camara Canon EOS Rebel T7')
            ->assertSee('3 dias')
            ->assertSee('v1.0')
            ->assertSee('Aprobar solicitud')
            ->assertSee('Rechazar solicitud');
    }

    public function test_arrendador_can_approve_received_request(): void
    {
        $landlord = User::factory()->create([
            'role' => 'arrendador',
        ]);

        $tenant = User::factory()->create([
            'role' => 'arrendatario',
        ]);

        $transaction = Transaction::create([
            'user_id' => $tenant->id,
            'landlord_id' => $landlord->id,
            'item_name' => 'Camara Canon EOS Rebel T7',
            'starts_at' => now()->toDateString(),
            'ends_at' => now()->addDays(3)->toDateString(),
            'rental_days' => 3,
            'total_amount' => 180000,
            'status' => 'pendiente',
            'terms_version' => 'v1.0',
            'terms_snapshot' => 'Terminos',
            'accepted_terms_at' => now(),
        ]);

        $response = $this->actingAs($landlord)->patch(route('landlord.requests.update', $transaction), [
            'decision' => 'aprobada',
        ]);

        $response
            ->assertRedirect(route('landlord.requests.index'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'status' => 'aprobada',
        ]);

        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id,
            'status' => 'pendiente',
        ]);
    }

    public function test_arrendador_can_reject_received_request(): void
    {
        $landlord = User::factory()->create([
            'role' => 'arrendador',
        ]);

        $tenant = User::factory()->create([
            'role' => 'arrendatario',
        ]);

        $transaction = Transaction::create([
            'user_id' => $tenant->id,
            'landlord_id' => $landlord->id,
            'item_name' => 'Camara Canon EOS Rebel T7',
            'starts_at' => now()->toDateString(),
            'ends_at' => now()->addDays(3)->toDateString(),
            'rental_days' => 3,
            'total_amount' => 180000,
            'status' => 'pendiente',
            'terms_version' => 'v1.0',
            'terms_snapshot' => 'Terminos',
            'accepted_terms_at' => now(),
        ]);

        $response = $this->actingAs($landlord)->patch(route('landlord.requests.update', $transaction), [
            'decision' => 'rechazada',
        ]);

        $response
            ->assertRedirect(route('landlord.requests.index'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'status' => 'rechazada',
        ]);

        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id,
            'status' => 'pendiente',
        ]);
    }
}
