<?php
include_once '../util/MySQLConnet.php';
class categoryModel
{
    private $maLoaiGiay;
    private $tenLoai;
    public function getMaLoaGiay()
    {
        return $this->maLoaiGiay;
    }

    public function getTenLoai()
    {
        return $this->tenLoai;
    }

    public  function setMaLoaiGiay($maLoaiGiay)
    {
        $this->maLoaiGiay = $maLoaiGiay;
    }

    public function setTenLoai($tenLoai)
    {
        $this->tenLoai = $tenLoai;
    }


    public function __construct($maLoaiGiay, $tenLoai)
    {
        $this->tenLoai = $tenLoai;
        $this->maLoaiGiay = $maLoaiGiay;
    }
    public function  inssertCategoty()
    {
        $data = [
            'maLoaiGiay' => $this->maLoaiGiay,
            'tenLoai' => $this->tenLoai
        ];
        $dbConnet = new MySQLConnet();
        $pdo = $dbConnet->connet();
        $sql = "INSERT INTO loaigiay (maLoaiGiay, tenLoai) VALUES (:maLoaiGiay,:tenLoai)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getAllCagetory()
    {
        $data = null;
        $dbConn = new MySQLConnet();
        $sql = "select *from loaigiay";
        return $data = $dbConn->getAllData($sql);
        $dbConn->disconnet();
        return $data; 
    }
    public function getData()
    {
       
        $dbConn = new MySQLConnet();
        $sql = "select * from loaigiay WHERE maLoaiGiay=:maLoaiGiay";
        $data = ['maLoaiGiay' => $this->getMaLoaGiay()];
        $cate=$dbConn->getData($sql,$data);
        $dbConn->disconnet();
        return $cate;

    }

    public function getUser($maLoaiGiay, $tenLoai)
    {
        $data = [
            'maLoaiGiay' => $this->maLoaiGiay,
            'tenLoai' => $this->tenLoai
        ];
        $dbConn = new MySQLConnet();
        $sql = "SELECT * FROM loaigiay WHERE maLoaiGiay=:maLoaiGiay";
    }

    public function deleteData($maLoaiGiay)
    {
        $data = [
            'maLoaiGiay' => $maLoaiGiay
        ];
        $dbConnet = new MySQLConnet();
        $sql = "DELETE FROM loaigiay WHERE maLoaiGiay=:maLoaiGiay";
        $dbConnet->deleteData($sql, $data);
    }
    public function updateData($maLoaiGiay, $tenLoai)
    {
        $data = [
            'maLoaiGiay' => $maLoaiGiay,
            'tenLoai'=>$tenLoai 
        ];
        $dbConnet = new MySQLConnet();
        $sql = "UPDATE loaigiay set tenLoai=:tenLoai WHERE maLoaiGiay=:maLoaiGiay";
        $dbConnet->update($sql, $data);
    }
}
