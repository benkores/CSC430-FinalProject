<?php
include_once "config/database.php";
    class Airports {

        private $conn;

        public function __construct() {
            $this->conn = new Database();
            $this->conn = $this->conn->getConnection();
        }

        public function getFromAirports() {
            $from_airports = array();
            $sqlQuery = "SELECT * FROM AIRPORTS";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $airport = array();
                array_push($airport, $row['ID']);
                array_push($airport, $row['name']);
                array_push($from_airports, $airport);
            }
            return $from_airports;
        }

        public function getToAirports(string $from_airport) {
            $to_airports = array();
            $sqlQuery = "SELECT * FROM AIRPORTS WHERE ID != '$from_airport'";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $airport = array();
                array_push($airport, $row['ID']);
                array_push($airport, $row['name']);
                array_push($to_airports, $airport);
            }
            return $to_airports;
        }

        
    }