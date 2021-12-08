<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPage extends Mailable {

    use Queueable, SerializesModels;

    // public $subject = 'Contato do site';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request) {

        $this->setSubject('Contato do Site ' . get_config('site_title'));
        $this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $data['request'] = $this->request;
        return $this->view('emails.contato', $data);
    }

    // /**
    //  * Build the message.
    //  *
    //  * @return $this
    //  */
    // public function build()
    // {
    //     return $this->markdown('emails.orcamento');
    // }

}
