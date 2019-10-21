<?php


namespace App\Domain\Model\Video;


interface VideoRepositoryInterface
{
    /**
     * @param $id
     * @return Video|null
     */
    public function find($id) : ?Video;

    /**
     * @param array $criteria
     * @return Video[]
     */
    public function findBy(array $criteria) : array;

    /**
     * @param array $criteria
     * @return Video[]
     */
    public function findAll(array $criteria) : array;

    /**
     * @param Video $video
     */
    public function add(Video $video) : void;
}