<?php
require_once 'class/accounts.php';
require_once 'class/airports.php';
require_once 'class/flight_seats.php';
require_once 'class/flights.php';
require_once 'class/user_bookings.php';
function getAirportsDB()
{
  $airports = new Airports();
  return $airports;
}

function getFlightsDB()
{
  $flights = new Flights();
  return $flights;
}
?>