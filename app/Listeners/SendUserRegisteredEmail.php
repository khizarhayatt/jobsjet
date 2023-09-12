<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\AccountInfoEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisteredEvent $event): void
    {
        dd($event);
        $info = array(
            'email' => $event->email,
            'first_name' => $event->first_name,
            'last_name' => $event->last_name,
        );
        Mail::to($event->email)->send(new AccountInfoEmail($info));
    }
}
