
<?php
define('__ROOT__', dirname(dirname(__FILE__)));
include(__ROOT__ . '../config.php');
class MySQLConnet
{
    //put your code here
    private $servername = SERVERNAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $db = DB;
    private $conn;
    public function __construct()
    {
        $this->connet();
        // $this->servername="localhost";
        // $this->username="root";
        //  $this->password="";
        // $this->db="do_an";
    }
    public function connet()
    {

        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }
    public function disconnet()
    {
        $this->conn = null;
    }
    // public function getAllData($sql,$data=array()){
    //     $dbCon= new MySQLConnet();
    //     $pdo=$dbCon->connet();
    //     $stmt=$pdo->prepare($sql);  
    //     $stmt->execute($data);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function  insertData($sql, $data = array())
    {
        $dbCon = new MySQLConnet();
        $pdo = $dbCon->connet();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnet();
    }
    public function getData($sql, $data = array())
    {
        $dbCon = new MySQLConnet();
        $pdo = $dbCon->connet();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $user = $stmt->fetch();
        $dbCon->disconnet();
        return $user;
    }
    public function getAllData($sql)
    {
        $dbCon = new MySQLConnet();
        $pdo = $dbCon->connet();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll();
        $dbCon->disconnet();
        return $user;
    }
    public function deleteData($sql, $data = array())
    {
        $dbCon = new MySQLConnet();
        $pdo = $dbCon->connet();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $dbCon->disconnet();
    }
    public function update($sql, $data = array())
    {
        $dbCon = new MySQLConnet();
        $pdo = $dbCon->connet();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}
