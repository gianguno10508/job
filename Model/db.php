<?php
class Db
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $database = 'job';

    private $conn = NULL;

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
        if (!$this->conn) {
            echo "Kết nối thất bại!";
            exit();
        } else {
            if (!mysqli_set_charset($this->conn, 'utf8')) {
                echo "Error loading character set utf8: " . mysqli_error($this->conn);
                exit();
            }
        }
        return $this->conn;
    }

}
?>