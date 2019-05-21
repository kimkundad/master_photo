<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $token;

    protected $notifiable;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($token, $notifiable)
 {
   $this->token = $token;
   $this->notifiable = $notifiable;
 }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
 {
   return $this->markdown('emails.users.resetpassword', [
   'url' => url(config('app.url').route('password.reset', $this->token, false)),
   'token' => $this->token,
   'name' => $this->notifiable->name,
   ]);
 }
}
