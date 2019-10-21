<?php


namespace App\Application\Import\service;


use App\Domain\Model\Provider\Provider;
use App\Infrastructure\Service\Parser\YamlParser;
use App\Infrastructure\Service\Source\FlubSource;
use App\Infrastructure\Service\Source\GlorfSource;
use App\Infrastructure\Service\Source\SourceInterface;
use App\Infrastructure\Service\Transfer\LocalTransfer;

class SourceFactory
{
    public function getSource($providerName) : SourceInterface
    {
        if ($providerName  == 'flub') {
            return new FlubSource(new LocalTransfer(), new YamlParser());
        }

        if ($providerName == 'glorf') {
            return new GlorfSource(new LocalTransfer());
        }

        throw new \InvalidArgumentException(sprintf('Unknown provider with name: %s', $providerName));
    }
}