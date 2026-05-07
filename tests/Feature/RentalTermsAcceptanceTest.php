<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Tests\TestCase;

class RentalTermsAcceptanceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ValidateCsrfToken::class);
    }

    public function test_arrendatario_can_view_terms_before_confirming_rental(): void
    {
        $user = User::factory()->create([
            'role' => 'arrendatario',
        ]);

        $response = $this->actingAs($user)->get('/arrendatario');

        $response
            ->assertOk()
            ->assertSee('Terminos y condiciones')
            ->assertSee('He leido y acepto los terminos y condiciones')
            ->assertSee('Debes aceptar los terminos y condiciones para continuar.');
    }

    public function test_rental_cannot_be_confirmed_without_accepting_terms(): void
    {
        $user = User::factory()->create([
            'role' => 'arrendatario',
        ]);

        $response = $this->from('/arrendatario')
            ->actingAs($user)
            ->post('/arrendatario/confirmar', []);

        $response
            ->assertRedirect('/arrendatario')
            ->assertSessionHasErrors('accept_terms');

        $this->assertDatabaseCount('transactions', 0);
    }

    public function test_rental_is_confirmed_and_acceptance_is_registered_when_terms_are_accepted(): void
    {
        $landlord = User::factory()->create([
            'role' => 'arrendador',
        ]);

        $user = User::factory()->create([
            'role' => 'arrendatario',
        ]);

        $response = $this->actingAs($user)->post('/arrendatario/confirmar', [
            'accept_terms' => '1',
        ]);

        $response
            ->assertRedirect(route('rentals.create'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'landlord_id' => $landlord->id,
            'item_name' => 'Camara Canon EOS Rebel T7',
            'status' => 'pendiente',
            'terms_version' => 'v1.0',
        ]);

        $this->assertDatabaseMissing('transactions', [
            'user_id' => $user->id,
            'accepted_terms_at' => null,
        ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'terms_snapshot' => '1. El arrendatario se compromete a usar el articulo de forma responsable y conforme a su finalidad.'
                . "\n" . '2. El arrendatario debe devolver el articulo en la fecha acordada y en condiciones equivalentes a las de la entrega.'
                . "\n" . '3. Cualquier dano, perdida o uso indebido puede generar cobros adicionales y afectaciones sobre el deposito.'
                . "\n" . '4. El arrendatario debe reportar incidentes o fallas relevantes a la plataforma de manera inmediata.'
                . "\n" . '5. La confirmacion del alquiler deja constancia de que el arrendatario conoce sus responsabilidades.',
        ]);
    }
}
