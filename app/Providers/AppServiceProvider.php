<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.navigation', function ($view): void {
            $notifications = collect();

            if (Auth::check() && Auth::user()->role === 'arrendatario') {
                $notifications = Auth::user()
                    ->transactions()
                    ->whereIn('status', ['aprobada', 'rechazada'])
                    ->latest('updated_at')
                    ->take(6)
                    ->get()
                    ->map(function ($transaction): array {
                        $isApproved = $transaction->status === 'aprobada';

                        return [
                            'id' => $transaction->id,
                            'title' => $isApproved
                                ? 'Solicitud aprobada'
                                : 'Solicitud rechazada',
                            'message' => $isApproved
                                ? 'Tu solicitud para ' . $transaction->item_name . ' fue aprobada.'
                                : 'Tu solicitud para ' . $transaction->item_name . ' fue rechazada.',
                            'status' => $transaction->status,
                            'updated_at' => $transaction->updated_at,
                        ];
                    })
                    ->values();
            }

            $view->with('renterNotifications', $notifications);
        });
    }
}
