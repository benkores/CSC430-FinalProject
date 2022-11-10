<?php
    class Accounts{

        // Connection
        private $conn;

        // Table

        // Columns
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAccounts(){
            $sqlQuery = "SELECT id, username, password FROM ACCOUNTS";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createAccount(string $username, string $password){
            $sqlQuery = "INSERT INTO ACCOUNTS(username,password) VALUES('$username','$password')";

            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $username=htmlspecialchars(strip_tags($username));
            $password=htmlspecialchars(strip_tags($password));
        
            // bind data
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pass", $password);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // UPDATE
        public function getSingleAccount(){
            $sqlQuery = "SELECT
                        id, 
                        username, 
                        password
                      FROM
                        ACCOUNTS
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->username = $dataRow['username'];
            $this->password = $dataRow['password'];

        }        

        // UPDATE
        public function updateAccount(){
            $sqlQuery = "UPDATE
                        ACCOUNTS
                    SET
                        username = :username, 
                        password = :password
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->username=htmlspecialchars(strip_tags($this->username));
            $this->password=htmlspecialchars(strip_tags($this->password));
        
            // bind data
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function deleteAccount(string $id){
            $sqlQuery = "DELETE FROM ACCOUNTS WHERE id = ";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function authenticateAccount(string $username, string $password) {
            $sqlQuery = "SELECT * FROM ACCOUNTS WHERE USERNAME='$username' AND PASSWORD='$password'";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row) {
                return true;
            } else {
            return false;
            }
            }
        
            public function checkUserExists(String $username) {
                $sqlQuery = "SELECT * FROM ACCOUNTS WHERE USERNAME='$username'";
                $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row) {
                return true;
            } else {
            return false;
            }
            }
    }
?>