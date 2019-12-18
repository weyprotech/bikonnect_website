<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Bikonnect Connect';
        $name = "Bikonnect System";


        return $this->view('frontend.shared._email')
                    ->subject($subject)
                    ->with(['name' => $this->data['name'],
                            'phone' => $this->data['phone'],
                            'email' => $this->data['email'],
                            'content' => $this->data['content']]);
                            
    }
}
