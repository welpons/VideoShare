<?php

namespace Tests\Infrastructure\Validation;


use PHPUnit\Framework\TestCase;
use App\Application\Import\Validation\ProviderValidator;

class ProviderValidatorTest extends TestCase
{
    private $providerValidator;

    public function setUp(): void
    {
        parent::setUp();
        $this->providerValidator = new ProviderValidator(new MemoryProviderRepository());
    }

    public function testFindBy()
    {
        $this->providerValidator->validateByName('flub');

        $this->assertFalse($this->providerValidator->hasViolations());
    }

    public function testFindByUknownProvider()
    {
        $this->providerValidator->validateByName('unknown-provider');

        $this->assertTrue($this->providerValidator->hasViolations());
    }
}