<?php

class Content
{
    private $id;
    private $name;
    private $content;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNameTitle($name)
    {
        $this->name = $name;
    }

    public function getNameTitle(): string
    {
        return $this->name;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}