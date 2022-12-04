<?php
require_once "config/database.php";
class Accounts
{

    // Connection
    private $conn;

    // Table

    // Columns
    // Db connection
    public function __construct()
    {
        $this->conn = new Database();
        $this->conn = $this->conn->getConnection();
    }

    // GET ALL
    public function getAccounts()
    {
        $sqlQuery = "SELECT id, username, password FROM ACCOUNTS";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createAccount(string $username, string $password)
    {
        $sqlQuery = "INSERT INTO ACCOUNTS(username,password) VALUES('$username','$password')";

        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
    }
    public function authenticateAccount(string $username, string $password)
    {
        $sqlQuery = "SELECT * FROM ACCOUNTS WHERE USERNAME='$username' AND PASSWORD='$password'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUserExists(string $username)
    {
        $sqlQuery = "SELECT * FROM ACCOUNTS WHERE USERNAME='$username'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function getAccountID(string $username) {
        $sqlQuery = "SELECT * FROM ACCOUNTS WHERE USERNAME='$username'";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
        }
        return $id;
    }
}
?>