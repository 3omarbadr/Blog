<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us13'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->username == 'omarbadr';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
