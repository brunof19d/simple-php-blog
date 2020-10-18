<?php

class Content
{
    private int $id;
    private string $name;
    private string $content;

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}