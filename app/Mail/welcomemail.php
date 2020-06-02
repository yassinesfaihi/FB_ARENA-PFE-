<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use\app\user;
class welcomemail extends Mailable
{    

    use Queueable, SerializesModels;
    public $data;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data ,$password)
    {
        $this->data = $data;
        $this->password = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Welcome';
        return $this->markdown('emails.welcome')>with([
            'data' => $this->data,
            '$password' => $this->password,

]);
    }
}
