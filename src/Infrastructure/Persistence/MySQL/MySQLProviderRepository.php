<?php

namespace App\Infrastructure\Persistence\MySQL;

use App\Domain\Model\Provider\Provider;
use App\Domain\Model\Provider\ProviderRepositoryInterface;

class MySQLProviderRepository implements ProviderRepositoryInterface
{
    public function __construct()
    {
        /**
         * @TODO Pass a MySQL client other services like a serializer or other services to
         * trigger other processes on persiste
         */
    }

    public function find($id): ?Provider
    {
        // TODO: Implement find() method.
    }

    public function findOneBy(array $criteria): ?Provider
    {
        // TODO: Implement findOneBy() method.

        // Implementation to test
        return Provider::create(1, 'glorf');

    }

    public function findBy(array $criteria): array
    {
        return [];
        // TODO: Implement findBy() method.
    }

    public function add(Provider $provider): void
    {
        // TODO: Implement add() method.
    }

    public function findAll(array $criteria): array
    {
        // TODO: Implement findAll() method.
    }

}