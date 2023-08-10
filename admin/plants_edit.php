<?php
require("dashboard_part/head.php");
?>


<?php
require("dashboard_part/navbar.php");
?>


<?php
require("dashboard_part/sidebar.php");
?>



<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<?php

$plant_image = "";
$name = "";
$species = "";
$price = "";
$discount = "";
$description = "";
$category_id = "";
$quantity = "";
$status = "";




if (isset($_GET['plant_id']) && $_GET['plant_id'] != "") {

    $plant_id = get_save_value($con, $_GET['plant_id']);
    $slect_sql = "SELECT * FROM plants WHERE `plant_id` = '$plant_id'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $plant_image = $row['plant_image'];
    $name = $row['name'];
    $species = $row['species'];
    $price = $row['price'];
    $discount = $row['discount'];
    $description = $row['description'];
    $category_id = $row['category_id'];
    $quantity = $row['quantity'];
    $status = $row['status'];



}


if (isset($_POST['submit'])) {

    $plant_image = $_FILES["plant_image"]["name"];
    $pro_tmp_img = $_FILES["plant_image"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$plant_image");


    $name = get_save_value($con, $_POST['name']);
    $species = get_save_value($con, $_POST['species']);
    $price = get_save_value($con, $_POST['price']);
    $discount = get_save_value($con, $_POST['discount']);
    $description = get_save_value($con, $_POST['description']);
    $category_id = get_save_value($con, $_POST['category_id']);
    $quantity = get_save_value($con, $_POST['quantity']);
    $status = get_save_value($con, $_POST['status']);


    $update_sql = "UPDATE `plants` SET `plant_image`='$plant_image',`name`='$name',`species`='$species',`price`='$price',`discount`='$discount',`description`='$description',`category_id`='$category_id',`quantity`='$quantity',`status`='$status' WHERE `plant_id`='$plant_id'";

    $res = mysqli_query($con, $update_sql);

    if ($res) {
        echo "<script>Swal.fire('Edit Data Successfully')</script>";
    } else {
        echo "<script>Swal.fire('Not Edit Data ERROR')</script>";

    }
}


?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Plants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="plants.php">Plants</a></li>
                            <li class="breadcrumb-item active">Edit Plants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">plants Information <span><a
                                                href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants Image <span class="login-danger">*</span></label>
                                            <input class="form-control" type="file" name="plant_image"
                                                placeholder="Enter plant image" value="<?php echo $plant_image ?>">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Enter plant name" value="<?php echo $name ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants species <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="species"
                                                placeholder="Enter species" value="<?php echo $species ?>">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants price <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="price"
                                                placeholder="Enter price" value="<?php echo $price ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants discount <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="discount"
                                                placeholder="Enter discount" value="<?php echo $discount ?>">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>plants Discription <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="description"
                                                placeholder="Enter description" value="<?php echo $description ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">

                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">select Category</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `categories` ORDER BY category_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['category_id'] === $category_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['category_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['category_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-6">
                                    <div class="form-group local-forms">
                                        <label>Quantity <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity"
                                            placeholder="Enter quantity" value="<?php echo $quantity ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1"
                                        checked="1" required>
                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="dactive" value="0"
                                        required>
                                    <label class="form-check-label" for="inlineRadio2">Dactive</label>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<?php
require("dashboard_part/script.php");
?>