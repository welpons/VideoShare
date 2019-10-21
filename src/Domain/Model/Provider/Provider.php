<?php

namespace App\Domain\Model\Provider;

use App\Domain\EntityInterface;

class Provider implements EntityInterface
{
    /**
     * @var int;
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(int $id, string $name)
    {
        return new static($id, $name);
    }

    public function getId(): int
    {
        return $this->getId();
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }
}