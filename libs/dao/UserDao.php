<?php

require_once  __DIR__ . '/Database.php';
require_once  __DIR__ . '/../entity/UserEntity.php';

class UserDao extends Database
{
    public function insert($mail, $password, $name)
    {
        $sql = 'INSERT INTO `users` (name, mail, password, created, modified)';
        $sql .= ' VALUES (:name, :mail, :password, NOW(), NOW())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name',     $name,     \PDO::PARAM_STR);
        $stmt->bindValue(':mail',     $mail,     \PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
        $result = $stmt->execute();
        if($result) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }
    public function findById($id)
    {
        $sql = 'SELECT * FROM `users` WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        return empty($data) ? null : new UserEntity($data);
    }
    public function findByMailAndPassword($mail, $password)
    {
        $sql = 'SELECT * FROM `users` WHERE mail = :mail AND password = password';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':mail',     $mail,     \PDO::PAEAM_STR);
        $stmt->bindValue(':password', $password, \PDO::PAEAM_STR);
        $stmt->execute();
        $data = $stmt->fetch();
        return empty($data) ? null : new UserEntity($data);
    }
}