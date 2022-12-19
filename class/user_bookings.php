<?php
require_once "config/database.php";
class User_Bookings
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
        $this->conn = $this->conn->getConnection();
    }

    public function addBooking(int $account_id, int $flight_id, int $seat_id, string $first_name, string $last_name, string $person_type)
    {
        $sqlQuery = "INSERT INTO USER_BOOKINGS(account_id,flight_id,seat_id,first_name,last_name,person_type) VALUES ($account_id,$flight_id,$seat_id,'$first_name','$last_name','$person_type')";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
    }

    public function getUserBookings(int $account_id)
    {
        $bookings = array();
        $sqlQuery = "SELECT * FROM USER_BOOKINGS WHERE ACCOUNT_ID=$account_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $booking = array();
            array_push($booking, $row['flight_id']);
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "departure_id"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "arrival_id"));
            array_push($booking, $row['first_name']);
            array_push($booking, $row['last_name']);
            array_push($booking, $row['person_type']);
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "gate"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "terminal"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "boarding_begins"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "boarding_ends"));
            $seat_type = $this->getColumnFromFlightSeats("seat_type", $row['seat_id']);
            if ($seat_type == "first") {
                array_push($booking, 1);
            } else if ($seat_type = "business") {
                array_push($booking, 2);
            } else {
                array_push($booking, 3);
            }
            array_push($booking, $this->getColumnFromFlightSeats("seat", $row['seat_id']));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "departure_date"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "departure_time"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "arrival_date"));
            array_push($booking, $this->getColumnFromFlights($row['flight_id'], "arrival_time"));
            array_push($booking, $row['id']);
            array_push($bookings, $booking);
        }
        return $bookings;
    }

    public function deleteBooking(int $booking_id)
    {
        $sqlQuery = "DELETE FROM USER_BOOKINGS WHERE ID=$booking_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
    }

    public function getColumnFromFlights(int $flight_id, string $column)
    {
        $sqlQuery = "SELECT $column FROM FLIGHTS WHERE ID=$flight_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $value = $row[$column];
        }
        return $value;
    }

    public function getColumnFromFlightSeats(string $column, int $seat_id)
    {
        $sqlQuery = "SELECT $column FROM FLIGHT_SEATS WHERE SEAT_ID=$seat_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $value = $row[$column];
        }
        return $value;
    }
}