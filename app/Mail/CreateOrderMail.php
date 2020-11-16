<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected Order $order;
    protected $customer_name;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @param $customer_name
     */
    public function __construct(Order $order, $customer_name)
    {
        $this->order = $order;
        $this->customer_name = $customer_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ordercreated')
                    ->with([
                        'order' => $this->order,
                        'customer_name' => $this->customer_name,
                        'order_date' => $this->order->created_at->format('d/m/Y'),
                        'order_hour' => $this->order->created_at->format('H:i')
                    ])
                    ->subject('Novo pedido criado!');
    }
}
