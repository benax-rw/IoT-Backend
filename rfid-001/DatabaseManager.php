<?php
class DatabaseManager {
    private $db_file = "database.sqlite"; // Path to SQLite database file
    protected $con; // Make $con protected to allow access in child classes
    public function __construct() {
        try {
            // Connecting to the SQLite database
            $this->con = new PDO("sqlite:" . $this->db_file);
            // Setting connection attributes
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }
    public function getConnection() {
        return $this->con;
    }
}
?>
