<?php
include_once "../model/productModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $productid = isset($_POST['ProductID']) ? $_POST['ProductID'] : '';
    $productName = $_POST['Productname'];
    $ProductPrice = $_POST['ProductPrice'];
    $ProductColor = $_POST['ProductColor'];
    $ProductSize = $_POST['ProductSize'];
    $Description = $_POST['Description'];
    $categoryID = $_POST['categoryID'];

    if ($_FILES['img']['name'] == "") {
        $img = $_POST['imgP'];
    } else {
        $img = $_FILES['img']['name'];
    }
    
    $product = new productModel($productid, $productName, $ProductPrice, $ProductColor, $ProductSize,  $img, $Description, $categoryID);

    $data = $product->getData($productid);
 
    if ($data == false) {
        try {
            $product->inssertProduct();
            move_uploaded_file($_FILES['img']['tmp_name'], "../view/img/" . $img);
            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            header("Location: ../view/add-product.php");
        }
    } else {
        try {
            
            $product->updateData($productid,$productName, $ProductPrice, $ProductColor, $ProductSize,  $img, $Description, $categoryID);
            move_uploaded_file($_FILES['img']['tmp_name'], "../view/img/" . $img);
            $_SESSION["update"] = true;
            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            $_SESSION["update"] = false;
            echo "fail";
            //header("Location: ../view/editCategory.php");
        }
    }
}
