<?php

class BoardEntity{

    public $id;
    public $title;
    public $created;
    public $modified;

    public function __construct($data)
    {
        $this->id       = $data['id'];
        $this->title    = $data['title'];
        $this->created  = $data['created'];
        $this->modified = $data['modified'];
    }
}