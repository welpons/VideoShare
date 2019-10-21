<?php


namespace App\Application\Import\Validation;


use App\Domain\EntityInterface;

interface ValidatorInterface
{
    public function validate(EntityInterface $entity) : void;

    /**
     * @return bool
     */
    public function hasViolations() : bool;

    /**
     * @return array
     */
    public function getViolations() : array;

}