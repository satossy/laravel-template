<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $subj;
    protected $template;
    protected $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $template, $params, $attached_files = [])
    {
        //
        $this->subject = $subject;
        $this->template = $template;
        $this->params = $params;
        $this->attached_files = $attached_files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->subject($this->subject)
                     ->view($this->template, $this->params);

        foreach($this->attached_files as $file) {
            $option = [];
            empty($file->name) ? : $option = array_merge($option, [ "as"   => $file->name ]);
            empty($file->name) ? : $option = array_merge($option, [ "mime" => $file->mime ]);
            $body->attach($file->path, $option);
        }

        return $body;
    }
}
