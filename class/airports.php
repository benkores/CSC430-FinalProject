<?php
require_once "config/database.php";
class Airports
{

    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
        $this->conn = $this->conn->getConnection();
    }

    public function getAirports()
    {
        $airports = array();
        $sqlQuery = "SELECT * FROM AIRPORTS";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $airport = array();
            array_push($airport, $row['ID']);
            array_push($airport, $row['name']);
            array_push($airports, $airport);
        }
        return $airports;
    }


}