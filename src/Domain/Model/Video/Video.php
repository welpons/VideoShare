<?php

namespace App\Domain\Model\Video;

class Video
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $name;

    /**
     * @var App\Domain\Tag\Tag[]
     */
    private $tags;

    /**
     * @var \DateTimeInterface
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var \DateTimeInterface
     */
    private $deletedAt;

    private function __construct(int $id, string $url, ?string $name = null, ?array $tags = [])
    {
        $this->id = $id;
        $this->url = $url;
        $this->name = $name;
        $this->tags = $tags;
        $this->createdAt = new \DateTimeImmutable();
    }

    public static function createByUrl(int $id, string $url)
    {
        return new static($id, $url);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags(?array $tags = [])
    {
        $this->tags = $tags;
    }


}