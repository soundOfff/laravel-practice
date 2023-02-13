<?php

namespace App\Providers;

use App\Services\INewsletter;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

use function PHPUnit\Framework\returnSelf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(
            INewsletter::class,
            function () {
                $client = new ApiClient();
                $client->setConfig([
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => 'us8'
                ]);

                return new MailchimpNewsletter($client);
            }
        );
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(fn () => auth()->user()?->isAdmin);
        Gate::define('admin', function () {
            return auth()->user()?->isAdmin;
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
