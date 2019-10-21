<?php

namespace App\Infrastructure\Persistence\Cassandra;

use App\Domain\Model\Provider\Provider;
use App\Domain\Model\Provider\ProviderRepositoryInterface;

class CassandraProviderRepository implements ProviderRepositoryInterface
{
    public function __construct()
    {
        // @TODO Pass a Cassandra client
    }

    /**
     * @param $id
     * @return Provider|null
     */
    public function find($id): ?Provider
    {
        // TODO: Implement find() method.
    }

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findBy(array $criteria): array
    {
        // TODO: Implement findBy() method.
    }

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findAll(array $criteria): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param Provider $provider
     */
    public function add(Provider $provider): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @param array $criteria
     * @return Provider|null
     */
    public function findOneBy(array $criteria): ?Provider
    {
        // TODO: Implement findOneBy() method.
    }
}