<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable {

    use Queueable, SerializesModels;

    public $subject = 'Contato do site';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $data['request'] = $this->request;
        return $this->view('emails.orcamento', $data);
    }

}
