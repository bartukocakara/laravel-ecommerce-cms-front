<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $datas, $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas, $products)
    {
        $this->datas = $datas;
        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mona Tasarım - Sipariş İptali')
        ->view('mails.order-canceled');
    }
}
