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

$acName = "";
$accimage = "";
$status = "";




if (isset($_GET['acId']) && $_GET['acId'] != "") {

    $acId = get_save_value($con, $_GET['acId']);
    $slect_sql = "SELECT * FROM accessorycategory WHERE `acId` = '$acId'";
    $res = mysqli_query($con, $slect_sql);
    $row = mysqli_fetch_assoc($res);

    $acName = $row['acName'];
    $accimage = $row['accimage'];
    $status = $row['status'];



}


if (isset($_POST['submit'])) {

    $acName = get_save_value($con, $_POST['acName']);

    $accimage = $_FILES["accimage"]["name"];
    $pro_tmp_img = $_FILES["accimage"]["tmp_name"];
    $uploads_dir = "uploads_img";
    move_uploaded_file($pro_tmp_img, "$uploads_dir/$accimage");

    $status = get_save_value($con, $_POST['status']);



    $update_sql = "UPDATE `accessorycategory` SET `acName`='$acName',`accimage`='$accimage',`status`='$status' WHERE `acId`='$acId'";
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
                        <h3 class="page-title">Edit Accessory Category</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="accessorycategory.php">Accessory Category</a></li>
                            <li class="breadcrumb-item active">Edit Accessory Category</li>
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
                                    <h5 class="form-title student-info">Acc
                                        e ssory Category Information <span><a href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>



                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Accessory Category name <span class="login-danger">*</span></label>
                                        <input class="form-control w-50" name="acName" type="text"
                                            placeholder="Enter First Name" value="<?php echo $acName ?>">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Accessory Category Image <span class="login-danger">*</span></label>
                                        <input class="form-control w-50" name="accimage" type="file"
                                            placeholder="Enter Image" value="<?php echo $accimage ?>">
                                    </div>
                                </div>





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