<?php

namespace Asylum29\TestBundle\Classes;

interface RecipientInterface
{
    public const TAG = 'asylum29.test_bundle.recipient';
    function getName(): string;
}
