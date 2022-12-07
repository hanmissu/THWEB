<?php
include "../model/categoryModel.php";

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
              <h2 class="tm-block-title d-inline-block">Edit Category</h2>
            </div>
          </div>
          <?php
          $id = $_GET['id'];
          $category = new categoryModel($id, "");
          $data = $category->getData();
         
          ?>
              <div class="row tm-edit-product-row">
                <div class="col-xl-6 col-lg-6 col-md-12">

                  <form action="../Controller/CategoryController.php" method="POST" class="tm-edit-product-form">
                    <div class="form-group mb-3">
                      <label for="name">Category ID
                      </label>
                      <input id="CategoryID" name="CategoryID" value="<?php echo $data['maLoaiGiay']; ?>" type="text" class="form-control validate" disabled required />
                    </div>
                    <div class="form-group mb-3">
                      <label for="description">Category Name</label>
                      <input id="CategoryName" name="CategoryName" value="<?php echo $data['tenLoai'];?>" type="text" class="form-control validate" required />
                    </div>
                    
                    <div class="col-12">
                      <button type="submit" value="edit" class="btn btn-primary btn-block text-uppercase">EDIT Category Now</button>
                    </div>
                  </form>

                </div>

              </div>
          <?php
          ?>
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