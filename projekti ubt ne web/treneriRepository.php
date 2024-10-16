<?php
include_once('connect.php');

class treneriRepository{
    private $connection;
    
    public function __construct()
    {
        $conn = new connect;
        $this->connection = $conn->startConnection();
    }


    public function insertTreneri($treneri){
        $conn = $this->connection;

        $emri = $treneri->getEmri();
        $mbiemri = $treneri->getMbiemri();
        $emaili = $treneri ->getEmaili();
        $gjinia = $treneri->getGjinia();
        $niveli = $treneri->getNiveliCertifikimit();

        $sql = "INSERT INTO treneri(Emri,Mbiemri,Emaili,Gjinia,NiveliCertifikimit) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement = execute([$emri,$mbiemri,$emaili,$gjinia,$niveli]);

        echo "<script>alert('u shtua me sukses!')</script>";
    }
    public function getAllTrenerat(){
        $conn = $this->connection;

        $sql = "SELECT * FROM treneri";
        $statement = $conn ->query($sql);

        $trenerat = $statement->fetchAll();
        return $trenerat;
    }

    public function editTrenerat($id,$emri,$mbiemri,$emaili,$gjinia,$niveli){
        $conn = $this->connection;
        $sql = "UPDATE treneri SET Emri =?, Mbiemri =?, Emaili=?, Gjinia=?,NiveliCertifikimit=? WHERE Id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$emri,$mbiemri,$emaili,$gjinia,$niveli]);

        echo "<script>alert('u ndryshua me sukses!') </script>";
    }
    function getTreneriById($Id){
        $conn = $this->connection;

        $sql = "SELECT * FROM treneri WHERE Id=?";

        $statement = $conn->prepare($sql);
        $statement ->execute([$id]);
        $student=$statement->fetch();

        return $treneri;
    }

}

?>