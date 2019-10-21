<?php


namespace App\Domain\Model\Video;


class VideoCollection implements \Iterator
{

    private $videoCollection = [];

    public function current()
    {
        return current($this->videoCollection);
    }

    public function next()
    {
        return next($this->videoCollection);
    }

    public function key()
    {
        return key($this->videoCollection);
    }

    public function valid()
    {
        $key = key($this->videoCollection);

        return ($key !== NULL && $key !== FALSE);
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function add(Video $video)
    {
        array_push($this->videoCollection, $video);
    }
}