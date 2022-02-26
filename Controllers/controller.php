<?php
Class Controller 
{
    private $Student;

    public function __construct(PDO $pdo) 
    {
        $this->Student = new Student($pdo);
    }

    public function index() {

        $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_SPECIAL_CHARS);
        

        switch ($page) {

            case ($page === ""):
                echo "heloo";
                exit();
            break;

            case ($page === "students"):
                echo json_encode($this->Student->fetchAll());
            break;
            
            default:
                require "Views/error.php";
                exit();
            break;
        }
    }
}



