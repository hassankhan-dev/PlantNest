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

$city_name = "";
$state_id = "";
$status = "";




if (isset($_GET['city_id']) && $_GET['city_id'] != "") {

    $city_id = get_save_value($con, $_GET['city_id']);
    $slect_sql = "SELECT * FROM city WHERE `city_id` = '$city_id'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $city_name = $row['city_name'];
    $state_id = $row['state_id'];
    $status = $row['status'];



}


if (isset($_POST['submit'])) {

    $city_name = get_save_value($con, $_POST['city_name']);
    $state_id = get_save_value($con, $_POST['state_id']);
    $status = get_save_value($con, $_POST['status']);



    $update_sql = "UPDATE `city` SET `city_name`='$city_name',`state_id`='$state_id',`status`='$status' WHERE `city_id`='$city_id'";
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
                        <h3 class="page-title">Edit City</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="city.php">City</a></li>
                            <li class="breadcrumb-item active">Edit Citys</li>
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
                                    <h5 class="form-title student-info">City Information <span><a href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h5>
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <label>City name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="city_name" type="text"
                                                placeholder="Enter First Name" name="city_name"
                                                value="<?php echo $city_name ?>">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group local-forms">
                                            <select name="state_id" id="state_id" class="form-control">
                                                <option value="">select state</option>
                                                <?php
                                                $selec_pro = "SELECT * FROM `state` ORDER BY state_name ASC";
                                                $cat_pro = mysqli_query($con, $selec_pro);
                                                while ($row_cat = mysqli_fetch_assoc($cat_pro)) {
                                                    $selected = ($row_cat['state_id'] === $state_id) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?php echo $row_cat['state_id'] ?>" <?php echo $selected ?>><?php echo $row_cat['state_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="active"
                                                value="1" checked="1" required>
                                            <label class="form-check-label" for="inlineRadio1">Active</label>
                                        </div>
                                        <div class="form-check form-check-i
                                           nline">
                                            <input class="form-check-input" type="radio" name="status" id="dactive"
                                                value="0" required>
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