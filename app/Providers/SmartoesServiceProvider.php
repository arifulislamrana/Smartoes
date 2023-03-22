<?php

namespace App\Providers;

use App\MailSender\Mailer\InterfaceMailer;
use App\MailSender\Mailer\Mailer;
use Illuminate\Support\ServiceProvider;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\UserRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\UserRepository\IUserRepository;

class SmartoesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(InterfaceMailer::class, Mailer::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
