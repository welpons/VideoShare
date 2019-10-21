<?php

namespace App\Infrastructure\Service\Parser;

interface ParserInterface
{
    public function parse($sfileContent) : array;
}