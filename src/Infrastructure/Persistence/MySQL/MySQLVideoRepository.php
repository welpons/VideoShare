<?php


namespace App\Infrastructure\Persistence\MySQL;



use App\Domain\Model\Video\Video;
use App\Domain\Model\Video\VideoRepositoryInterface;

class MySQLVideoRepository implements VideoRepositoryInterface
{

    /**
     * @param $id
     * @return Video|null
     */
    public function find($id): ?Video
    {
        // TODO: Implement find() method.
    }

    /**
     * @param array $criteria
     * @return Video[]
     */
    public function findBy(array $criteria): array
    {
        // TODO: Implement findBy() method.
    }

    /**
     * @param array $criteria
     * @return Video[]
     */
    public function findAll(array $criteria): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param Video $video
     */
    public function add(Video $video): void
    {
        // TODO: Implement add() method.
    }
}