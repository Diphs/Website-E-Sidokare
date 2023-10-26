<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $isi;
    public $nama;

    public function __construct($email, $nama, $isi)
    {
        $this->email = $email;
        $this->nama = $nama;
        $this->isi = $isi;
        
    }

    public function build()
    {
        return $this->view('emails.email-notification')
            ->subject('Komentar Website')
            ->from('diphandimorgan@gmail.com', 'Website Sidokare');
    }
}
