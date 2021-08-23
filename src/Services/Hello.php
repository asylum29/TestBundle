<?php

namespace Asylum29\TestBundle\Services;

use Asylum29\TestBundle\Classes\RecipientInterface;

class Hello
{
    private $recipients = [];

    public function addRecipient(RecipientInterface $recipient)
    {
        $this->recipients[] = $recipient;
    }

    public function hello()
    {
        $temp = ['Symfony'];
        /** @var RecipientInterface $recipient */
        foreach ($this->recipients as $recipient) {
            $temp[] = $recipient->getName();
        }
        $temp = implode(', ', $temp);
        return "Hello, $temp!";
    }
}
