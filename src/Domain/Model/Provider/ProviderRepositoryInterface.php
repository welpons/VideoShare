<?php

namespace App\Domain\Model\Provider;

interface ProviderRepositoryInterface
{
    /**
     * @param $id
     * @return Provider|null
     */
    public function find($id) : ?Provider;

    /**
     * @param array $criteria
     * @return Provider|null
     */
    public function findOneBy(array $criteria) : ?Provider;

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findBy(array $criteria) : array;

    /**
     * @param array $criteria
     * @return Provider[]
     */
    public function findAll(array $criteria) : array;

    /**
     * @param Provider $provider
     */
    public function add(Provider $provider) : void;
}