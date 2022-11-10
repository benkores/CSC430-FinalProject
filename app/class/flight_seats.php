<?php
class Flight_Seats
{

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getFlightSeats(int $flight_id)
    {
        $sqlQuery = "SELECT * FROM FLIGHT_SEATS WHERE FLIGHT_ID=$flight_id AND SEAT_BOOKED=false";
        $stmt = $this->conn->prepare($sqlQuery);
        $seats = array();
        $seat;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat = array();
            array_push($seat, $row['flight_id']);
            array_push($seat, $row['id']);
            array_push($seat, $row['seat_type']);
            array_push($seat, $row['seat']);
            array_push($seats, $seat);
        }
        return $seats;
    }

    public function getSeatID(string $seat)
    {   
        $seat_id;
        $sqlQuery = "SELECT ID FROM FLIGHT_SEATS WHERE SEAT='$seat'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat_id = $row['id'];
        }
        return $seat_id;
    }

    public function getSeatType(string $seat) {
        $seat_type;
        $sqlQuery = "SELECT SEAT_TYPE FROM FLIGHT_SEATS WHERE SEAT = '$seat'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $seat_type = $row['seat_type'];
        }
        return $seat_type;
    }
}