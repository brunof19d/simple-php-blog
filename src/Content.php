<?php

class Content
{
    private $id;
    private $name;
    private $content;
    private $date;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNameTitle($name)
    {
        $this->name = $name;
    }

    public function getNameTitle()
    {
        return $this->name;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setDate($date)
    {
        $this->date = $date;
        $date = new DateTime('');
        $date->format('Y-m-d');
    }

    public function getDate()
    {
        return $this->date;
    }
}