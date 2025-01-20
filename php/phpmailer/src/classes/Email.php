<?php

namespace src\classes;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class Email
{
    protected PHPMailer $mailer;
    protected array $from;
    protected array $to;
    protected string $subject;
    protected string $message;
    protected array $attachment = []; // variavel de anexo (arquivo)

    public function setTo(array $to) {
        if (!array_key_exists('name', $to) || !array_key_exists('email', $to)) {
            throw new Exception('As propriedades name e email são obrigatórias.'); 
        }
        $this->to = $to;
    }

    public function setFrom(array $from) {
        if (!array_key_exists('name', $from) || !array_key_exists('email', $from)) {
            throw new Exception('As propriedades name e email são obrigatórias.'); 
        }
        $this->from = $from;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setAttachment(string $attachment) {
        $this->attachment = $_FILES[$attachment];
    }

    protected function attachment() {
        if(!empty($this->attachment) && $this->attachment['error'] ==UPLOAD_ERR_OK) {
            $this->mailer->addAttachment(
                $this->attachment['tmp_name'],
                $this->attachment['name']
            );
        }
    }

    protected function config() {
        $this->mailer = new PHPMailer();
        //Server settings
        # $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;            
        $this->mailer->isSMTP();                                  
        $this->mailer->Host       = EMAIL_HOST;           
        $this->mailer->SMTPAuth   = true;                         
        $this->mailer->Username   = EMAIL_USERNAME;           
        $this->mailer->Password   = EMAIL_PASSWORD;                     
        # $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
        $this->mailer->Port       = 465;  
    }

    abstract public function send();

}