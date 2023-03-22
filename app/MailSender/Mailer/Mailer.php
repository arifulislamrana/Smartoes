<?php
namespace App\MailSender\Mailer;

use App\MailSender\MailerObjects\EmailVerificationObject;


class Mailer implements InterfaceMailer
{
    public function emailVarification(EmailVerificationObject $emailVerificationObject)
    {
        //implement here
    }
}
