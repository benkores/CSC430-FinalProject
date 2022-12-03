<?php
    require_once "config/database.php";
    class Flights {

        private $conn;

        public function __construct() {
            $this->conn = new Database();
            $this->conn = $this->conn->getConnection();
        }

        public function getFlights(string $from_airport, string $to_airport, string $departure_date) {
            $sqlQuery = "SELECT * FROM FLIGHTS WHERE DEPARTURE_ID = '$from_airport' AND ARRIVAL_ID = '$to_airport' AND DEPARTURE_DATE = '$departure_date'";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $flights = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $flight = array();
                array_push($flight, $row['id']);
                array_push($flight, $from_airport);
                array_push($flight, $to_airport);
                array_push($flight, $departure_date);
                array_push($flight, $row['departure_time']);
                array_push($flight, $row['arrival_date']);
                array_push($flight, $row['arrival_time']);
                array_push($flight, $row['gate']);
                array_push($flight, $row['terminal']);
                array_push($flight, $row['boarding_begins']);
				array_push($flight, $row['boarding_ends']);
				array_push($flight, $row['number_of_first_class_seats']);
				array_push($flight, $row['number_of_business_class_seats']);
				array_push($flight, $row['number_of_economy_seats']);
				array_push($flight, $row['first_cost']);
                array_push($flight, $row['business_cost']);
				array_push($flight, $row['economy_cost']);
                array_push($flights, $flight);
            }
            return $flights;
        }

        public function getSeatCost(int $flight_id, string $seat_type) {
            if ($seat_type == "first") {
                $seat_type = "first_cost";
            } else if ($seat_type == "business") {
                $seat_type = "business_cost";
            } else {
                $seat_type = "economy_cost";
            }
            $sqlQuery = "SELECT $seat_type FROM FLIGHTS WHERE ID=$flight_id";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cost = $row['seat_type'];
            }
            return $cost;
        }
    }