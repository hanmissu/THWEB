<?php
include_once "../model/categoryModel.php";
include_once "../model/productModel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Product Page - Admin HTML Template</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->

</head>

<body id="reportsPage">
  <?php include "./masterPage/menu.php" ?>
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
              <thead>
                <tr>
                  <th scope="col">&nbsp;</th>
                  <th scope="col">PRODUCT NAME</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>

              <!-- START List Product-->
              <?php
              $product = new productModel("", "", "", "", "", "", "", "", "");
              $data = $product->getAllCagetory();
    
              for ($i = 0; $i < count($data); $i++) {
              ?>
                <tbody>
                  <tr>
                    
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name"><?php echo $data[$i]['tenGiay'] ?></td>
                    <td><?php echo $data[$i]['gia'] ?></td>
                    <td>
                      <img src="./img/<?php echo $data[$i]['anh'] ?>" alt="Lỗi ảnh" style="max-width: 100px; max-height: 100px;" >
                     
                      </td>
                   
                      <td class="text-center">
                        <a href="../Controller/productController.php?action=delete&id=<?php echo $data[$i]['maGiay'] ?>">
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="edit-product.php?id=<?php echo $data[$i]['maGiay'] ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                      </td>
                  </tr>
                </tbody>
              <?php
              }
              ?>


              <!-- END List Product-->
            </table>
          </div>
          <!-- table container -->
          <a href="add-product.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
        </div>
      </div>

      <!-- category -->
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
          <h2 class="tm-block-title">Product Categories</h2>
          <div class="tm-product-table-container">

            <?php

            $category = new categoryModel(0, "");
            $data = $category->getAllCagetory();
            for ($i = 0; $i < count($data); $i++) {
            ?>
              <table class="table tm-table-small tm-product-table">
                <form action="../Controller/CategoryController.php" method="POST">
                  <tbody>
                    <tr>
                      <td class="product-name"><?php echo $data[$i]["tenLoai"] ?></td>
                      <td class="text-center">
                        <a href="../Controller/CategoryController.php?action=delete&id=<?php echo $data[$i]['maLoaiGiay'] ?>">
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="editCategory.php?id=<?php echo $data[$i]['maLoaiGiay'] ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </form>
              </table>

            <?php
            }
            ?>
          </div>
          <!-- table container -->
          <a href="addCategory.php"><button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button></a>

        </div>
      </div>
    </div>
  </div>

  <?php include "./masterPage/footer.php" ?>

  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function() {
      $(".tm-product-name").on("click", function() {
        window.location.href = "edit-product.php";
      });
    });
  </script>
</body>

</html>