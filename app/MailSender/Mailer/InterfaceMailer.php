<?php
namespace App\MailSender\Mailer;

use App\MailSender\MailerObjects\EmailVerificationObject;

interface InterfaceMailer
{
    public function emailVarification(EmailVerificationObject $emailVarificationObject);
}
