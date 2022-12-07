<?php


include_once '../util/MySQLConnet.php';
class userModel {
    //put your code here
    private $userName;
    private $password;
    
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public  function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }
    
    public function  inssertUser(){
        
        $data=[
            'name'=>$this->userName,
            'pass'=>$this->password
        ];
        $dbConnet= new MySQLConnet();
        $pdo= $dbConnet->connet();
        $sql= "INSERT INTO taikhoan (tenTK, matKhau) VALUES (:name,:pass)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute($data);
   }

 
   public function getData($userName){
       $data=["userName"=>$userName];
       $dbConn= new MySQLConnet();
       $sql= "SELECT * FROM admin WHERE tenTK=:userName";
       return $dbConn->getData($sql,$data);
   }

   public function getUser($userName,$password)
   {
     $data=[
        'userName'=>$this->userName,
        'password'=>$this->password
     ];
     $dbConn= new MySQLConnet();
     $sql= "SELECT * FROM admin WHERE tenTK=:userName";
     
   }

   public function deleteData($userName){
       $data=[
           'userName'=>$userName
       ];
       $dbConnet= new MySQLConnet();
       $sql="DELETE FROM admin WHERE tenTK=:userName";
       $dbConnet->deleteData($sql,$data);
   }
}
