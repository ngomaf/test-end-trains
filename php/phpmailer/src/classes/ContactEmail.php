<?php

namespace src\classes;

use Exception;

class ContactEmail extends Email 
{

    public function send() {
        $this->config();

        $this->attachment();
        
        //Recipients
        $this->mailer->setFrom($this->from['email'], $this->from['name']);
        $this->mailer->addAddress($this->to['email'], $this->to['name']);

        //Content
        $this->mailer->isHTML(true);            //Set email format to HTML
        $this->mailer->Subject = $this->subject;
        $this->mailer->Body    = $this->message;
        $this->mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $send = $this->mailer->send();

        if(!$send) {
            throw new Exception($this->mailer->ErrorInfo);
        }

        return $send;
    }

}