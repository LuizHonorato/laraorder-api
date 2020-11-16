<?php

namespace App\Listeners;

use App\Events\OrderCreatedEvent;
use App\Mail\CreateOrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderCreatedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreatedEvent $event)
    {
        //Enfileirando o e-mail no redis
        Mail::to('customer_email@test.com')->queue(new CreateOrderMail($event->order, $event->customer_name));
    }
}
