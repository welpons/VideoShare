<?php

namespace Tests\Infrastructure\Validation;

use App\Domain\Model\Provider\ProviderRepositoryInterface;
use App\Domain\Model\Provider\Provider;

class MemoryProviderRepository implements ProviderRepositoryInterface
{
    private $providers;

    public function __construct()
    {
        $this->providers = [
            Provider::create(1, 'flub'),
            Provider::create(2, 'glorf')
        ];
    }

    /**
     * @param $id
     * @return Provider|null
     */
    public function find($id): ?Provider
    {
        $result = array_filter($this->providers, function (Provider $provider) use ($id) {
            return $provider->getId() == $id;
        });

        return $result ? $result[0] : null;
    }

    /**
     * @param array $criteria
     * @return Provider|null
     */
    public function findOneBy(array $criteria): ?Provider
    {
        $result = array_filter($this->providers, function (Provider $provider) use ($criteria) {
            return $provider->getName() == $criteria['name'];
        });

        return $result ? $result[0] : null;
    }

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findBy(array $criteria): array
    {
        $result = array_filter($this->providers, function (Provider $provider) use ($criteria) {
            return $provider->getName() == $criteria['name'];
        });

        return $result ?? [];
    }

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findAll(array $criteria): array
    {
        return $this->providers;
    }

    /**
     * @param Provider $provider
     */
    public function add(Provider $provider): void
    {
        //@TODO Check if Id is unique
        array_push($this->providers, $provider);
    }

}