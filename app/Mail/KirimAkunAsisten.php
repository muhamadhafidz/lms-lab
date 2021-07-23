<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimAkunAsisten extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $pass)
    {
        $this->data = $item;
        $this->password = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Akun Asisten Laboratorium')
                    ->view('admin.email.email-asisten');
    }
}
