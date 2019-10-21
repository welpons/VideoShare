<?php

namespace App\Application\Import\Validation;

use App\Domain\EntityInterface;
use App\Domain\Model\Provider\Provider;
use App\Domain\Model\Provider\ProviderRepositoryInterface;

class ProviderValidator implements ValidatorInterface
{
    /**
     * @var ProviderRepositoryInterface
     */
    private $providerRepository;

    /**
     * @var array
     */
    private $violations = [];

    public function __construct(ProviderRepositoryInterface $providerRepository)
    {
        $this->providerRepository = $providerRepository;
    }

    public function validate(EntityInterface $entity): void
    {
        //@TODO valdates whether the entity is in a right state
    }

    /**
     * @param string $name
     * @return Provider|null
     */
    public function validateByName(string $name) : ?Provider
    {
        $criteria = ['name' => $name];

        $provider = $this->providerRepository->findOneBy($criteria);

        if (!$provider) {
            $this->violations[] = sprintf('Provider with name: %s not found', $name);
            return null;
        }

        return $provider;
    }

    /**
     * @return bool
     */
    public function hasViolations(): bool
    {
        return count($this->violations) > 0;
    }

    /**
     * @return array
     */
    public function getViolations(): array
    {
        return $this->violations;
    }

}