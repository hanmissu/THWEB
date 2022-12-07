<?php
include_once '../model/categoryModel.php';
$actionDel = isset($_GET['action']) ? $_GET['action'] : ''; 
$idDel = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_POST['CategoryID']) && isset($_POST['CategoryName'])) {

    $category = new categoryModel($_POST['CategoryID'], $_POST['CategoryName']);
    
    $id = $_POST['CategoryID'];

    $name = $_POST['CategoryName'];

    $result = $category->getData($id);

    if ($result == false) {

        try {
            $category->inssertCategoty();
            header("Location: ../view/products.php");
        } catch (\Throwable $th) {
            header("Location: ../view/addCategory.php");
        }

    } else {
        try {
            $category->updateData($id, $name);
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
        $category_action = new categoryModel($idDel, "");
        $category_action->deleteData($idDel);
        header("Location: ../view/products.php");
    } catch (\Throwable $th) {
        echo '<script>alert("Xóa không thành côngs")</script>';

    }
}

// $category_action="";
// if(isset($_POST['category_action'])){
//     $category_action=$_POST['category_action'];
// }
