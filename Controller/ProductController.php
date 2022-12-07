<?php 
include_once "../model/productModel.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
  
    $productName=$_POST['Productname'];
    $ProductPrice=$_POST['ProductPrice'];
    $ProductColor=$_POST['ProductColor'];
    $ProductSize=$_POST['ProductSize'];
    $img=$_FILES['img']['name'];
    $Description=$_POST['Description'];
    $categoryID=$_POST['categoryID'];
  
    $product= new productModel("",$productName, $ProductPrice, $ProductColor, $ProductSize,  $img,$Description,$categoryID);

    $data=$product->getData();
    if($data == false){
        try {
            $product->inssertProduct();
            move_uploaded_file($_FILES['img']['tmp_name'],"../view/img/".$img);
            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            header("Location: ../view/add-product.php");
        }
        
    }
    else{
        echo"update";
    }

}
