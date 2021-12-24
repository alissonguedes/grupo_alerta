<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPage extends Mailable {

    use Queueable, SerializesModels;

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

        return $this->from(get_config('contact_email'), get_config('site_title'))
            ->subject('Contato do Site ' . get_config('site_title'))
            ->view('emails.contato', $data);

    }

}
