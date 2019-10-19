<?php

class UserEntity{

    public $id;
    private $mail;
    private $password;
    public $name;
    public $created;
    public $modified;

    public function __construct($data)
    {
        $this->id       = $data['id'];
        $this->mail     = $data['mail'];
        $this->password = $data['password'];
        $this->name     = $data['name'];
        $this->created  = $data['created'];
        $this->modified = $data['modified'];
    }

    public function getMail() {
        return $this->mail;
    }
    public function getPassword() {
        return $this->password;
    }
}