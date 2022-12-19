<?php
require_once "config/database.php";
class Flight_Seats
{

    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
            $this->conn = $this->conn->getConnection();
    }

    public function getFlightSeats(string $class)
    {
        $sqlQuery = "SELECT * FROM FLIGHT_SEATS WHERE SEAT_TYPE='$class'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $seats = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat = array();
            array_push($seat, $row['seat_id']);
            array_push($seat, $row['seat_type']);
            array_push($seat, $row['seat']);
            array_push($seats, $seat);
        }
        return $seats;
    }

    public function getSeatID(string $seat)
    {   
        $sqlQuery = "SELECT ID FROM FLIGHT_SEATS WHERE SEAT='$seat'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat_id = $row['id'];
        }
        return $seat_id;
    }

    public function getSeatType(string $seat) {
        $sqlQuery = "SELECT SEAT_TYPE FROM FLIGHT_SEATS WHERE SEAT = '$seat'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat_type = $row['seat_type'];
        }
        return $seat_type;
    }

    public function updateSeatAmount(int $flight_id, string $seat_type) {
        if ($seat_type == "first") {
            $seat_type = "number_of_first_class_seats";
        } else if ($seat_type == "business") {
            $seat_type = "number_of_business_class_seats";
        } else {
            $seat_type = "number_of_economy_seats";
        }
        $sqlQuery= "SELECT $seat_type FROM FLIGHTS WHERE ID=$flight_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seatnum = $row['seat_type'];
        }
        $sqlQuery = "UPDATE FLIGHTS SET $seatnum=($seatnum-1) WHERE ID=$flight_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
    }
}