<?php
include_once "../model/productModel.php";
include_once "../model/categoryModel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Add Product - Dashboard HTML Template</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body>
  <?php include "./masterPage/menu.php" ?>

  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Edit Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <?php
              $product_id = $_GET['id'];
              $product = new productModel($product_id, "", "", "", "", "", "", "","");
              $data = $product->getData($product_id);

              ?>
              <form action="../Controller/ProductController.php" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                <div class="form-group mb-3">
              
                  <input id="name" name="ProductID" value="<?php echo $data["maGiay"] ?>" type="hidden" class="form-control validate"  required />
                </div>
                <div class="form-group mb-3">
                  <label for="name">Product Name
                  </label>
                  <input id="name" name="Productname" value="<?php echo $data["tenGiay"] ?>" type="text" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="name">Price
                  </label>
                  <input id="name" name="ProductPrice" value="<?php echo $data["gia"] ?>" type="number_format" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="name">Color
                  </label>
                  <input id="name" name="ProductColor" value="<?php echo $data["mauSac"] ?>" type="text" class="form-control validate" required />
                </div>
     
                <div class="form-group mb-3">
                  <label for="name">Size
                  </label>
                  <input id="name" name="ProductSize" value="<?php echo $data["size"] ?>" type="text" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea id="Description" name="Description" class="form-control validate" rows="3" required>
                  <?php echo $data["moTa"] ?>
                  </textarea>
                </div>


                <div class="form-group mb-3">
                  <label for="category">Category</label>
                  <select class="custom-select tm-select-accounts" id="categoryID" name="categoryID">
                    <?php
                    $category_id = $data["maLoaiGiay"];
                    $category = new categoryModel($category_id, "");
                    $data_category = $category->getAllCagetory();

                    for ($i = 0; $i < count($data_category); $i++) {
                    ?>
                      <option <?php if ($data["maLoaiGiay"] == $data_category[$i]["maLoaiGiay"]) {
                                echo 'selected="selected"';
                              } ?> value="<?php echo $data_category[$i]["maLoaiGiay"]; ?>"><?php echo $data_category["$i"]["tenLoai"]; ?></option>
                    <?php

                    }
                    ?>
                  </select>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="form-group mb-3">
                <label class="form-group mb-3" for="">Image Product</label>
                <input type="file" name="img" require>
                <input type="hidden" name="imgP" value=" <?php echo $data["anh"]; ?>">
              </div>
            </div>

            <a href="../Controller/ProductController.php">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Edit Product Now</button>
              </div>

            </a>

            </form>


          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "./masterPage/footer.php" ?>

  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- https://jquery.com/download/ -->
  <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
  <!-- https://jqueryui.com/download/ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script>
    $(function() {
      $("#expire_date").datepicker();
    });
  </script>
</body>

</html>