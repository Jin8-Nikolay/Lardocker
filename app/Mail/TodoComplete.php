<?php

namespace App\Mail;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TodoComplete extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var \App\Models\User
     */
    public $user;

    /**
     * The todo instance.
     *
     * @var \App\Models\Todo
     */
    public $todo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Todo $todo)
    {
        $this->user = $user;
        $this->todo = $todo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email, 'Todo завершено')
            ->view('mail.todoComplete');
    }
}
