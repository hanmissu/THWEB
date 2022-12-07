<?php
include_once "../model/categoryModel.php"

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
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="../Controller/ProductController.php" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">
                <div class="form-group mb-3">
                  <label for="name">Product Name
                  </label>
                  <input id="name" name="Productname" type="text" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="name">Price
                  </label>
                  <input id="name" name="ProductPrice" type="number_format" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="name">Color
                  </label>
                  <input id="name" name="ProductColor" type="text" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="name">Size
                  </label>
                  <input id="name" name="ProductSize" type="text" class="form-control validate" required />
                </div>

                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea id="Description" name="Description" class="form-control validate" rows="3" required></textarea>
                </div>

                
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                  <select class="custom-select tm-select-accounts" id="categoryID" name="categoryID">
                    <?php
                    $category = new categoryModel(0, "");
                    $data = $category->getAllCagetory();
                    echo "<option>Please select...</option>";
                    for ($i = 0; $i < count($data); $i++) {
                      $category_id = $data[$i]['maLoaiGiay'];
                      $category_name = $data[$i]['tenLoai'];

                      // current category of the product must be selected
                      if ($product->category_id == $category_id) {
                        echo "<option value='$category_id' selected>";
                      } else {
                        echo "<option value='$category_id'>";
                      }

                      echo "$category_name</option>";
                    }
                    ?>
                  </select>
                </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                  <div class="form-group mb-3">
                    <label class="form-group mb-3" for="">Image Product</label>
                    <input type="file" name="img" require>
                  </div>
                </div>

                <a href="../Controller/ProductController.php">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
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