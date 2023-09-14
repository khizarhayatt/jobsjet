<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\AccountInfoEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredEmail implements ShouldQueue
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

        $data = array(
            'email' => $event->user->email,
            'first_name' => $event->user->first_name,
            'last_name' => $event->user->last_name,
        );
        Mail::to($event->user->email)->send(new AccountInfoEmail($data));
    }
}