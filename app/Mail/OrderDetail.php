<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetail extends Mailable
{
    use Queueable, SerializesModels;

    public $datas, $products, $city, $district;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas, $products, $city, $district)
    {
        $this->datas = $datas;
        $this->products = $products;
        $this->city = $city;
        $this->district = $district;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mona Tasarım - Sipariş Detay')
        ->view('mails.order-details');
    }
}
