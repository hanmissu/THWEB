<?php
include_once "../model/productModel.php";
$actionDel = isset($_GET['action']) ? $_GET['action'] : '';
$idDel = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $productid = isset($_POST['ProductID']) ? $_POST['ProductID'] : '';
    $productName = isset($_POST['Productname']) ? $_POST['Productname'] : "";
    $ProductPrice = isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] : "";
    $ProductColor = isset($_POST['ProductColor']) ? $_POST['ProductColor'] : "";
    $ProductSize = isset($_POST['ProductSize']) ? $_POST['ProductSize'] : "";
    $Description = isset($_POST['Description']) ? $_POST['Description'] : "";
    $categoryID = isset($_POST['categoryID']) ? $_POST['categoryID'] : "";

    
    if ($_FILES['img']['name'] == "") {
        $img = $_POST['imgP'];
    } else {
        $img = $_FILES['img']['name'];
        $tmp_img = $_FILES['img']['tmp_name'];
    }

    $product = new productModel($productid, $productName, $ProductPrice, $ProductColor, $ProductSize, $img, $Description, $categoryID);

    $data = $product->getData($productid);
  
    if ($data == false) {
 
        try {
            $product->inssertProduct();
            move_uploaded_file($tmp_img, "../../img/" . $img);

            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            header("Location: ../view/add-product.php");
        }
    } else {
 
        try {

            $product->updateData();

            move_uploaded_file($tmp_img, "../../img/" . $img);

            $_SESSION["update"] = true;
            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            $_SESSION["update"] = false;
            echo "fail";
            //header("Location: ../view/editCategory.php");
        }
    }
}
if ($actionDel == 'delete') {
    try {
        $productDel = new productModel($idDel, "", "", "", "", "", "", "","");
        $productDel->deleteData($idDel);
        header("Location: ../view/products.php");
    } catch (\Throwable $th) {
        echo '<script>alert("Xóa không thành côngs")</script>';
    }
}
