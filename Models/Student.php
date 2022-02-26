<?php

class Student {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function fetch($data)
    {
        $stm = $this->pdo->prepare('SELECT * FROM student WHERE studentid = :studentid');
        $stm->bindValue(':studentid', $data['studentid']);
        $success = $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function fetchAll()
    {
        $stm = $this->pdo->prepare("SELECT * FROM student");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }


    public function create($data) 
    {
        $sql = "INSERT INTO student VALUES (NULL, :name)";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':name', $data['name']);  
        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : 0;
    }

    public function update($data)
    {
        $stm = $this->pdo->prepare('update student set name = :name where studentid = :studentid');
        $stm->bindValue(':studentid', $data['studentid']);
        $stm->bindValue(':name', $data['name']);
        $status = $stm->execute();
        return $status;
    }

    public function delete($data)
    {
        $stm = $this->pdo->prepare('delete from student where student = :student');
        $stm->bindValue(':student', $data['student']);
        $status = $stm->execute();
        return $status;
    }
}