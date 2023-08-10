<?php
require("connection/connection.inc.php");
require("connection/function.inc.php");

$output = ''; // Initialize the output variable

if ($_POST["query"] != '') {
    $search_array = explode(",", $_POST["query"]);
    $search_text = "'" . implode("','", $search_array) . "'";

    $sel_query = "SELECT * FROM `orderdetails` WHERE order_detail_id IN (" . $search_text . ") ORDER BY order_detail_id DESC ";
} else {
    $sel_query = "SELECT * FROM `orderdetails` WHERE `delete_status`= 0";
}

$run = mysqli_query($con, $sel_query);

if (mysqli_num_rows($run) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($run)) {
        $output .= '<tr>';
        $output .= '<td>' . 'ORDER' . ' ' . $i++ . '</td>';

        $output .= '<td>' . $row['order_id'] . '</td>';
        $output .= '<td>' . $row['plant_id'] . '</td>';
        $output .= '<td>' . $row['quantity'] . '</td>';


        $output .= '<td>';
        // Open the <td> tag here

        if ($row['status'] == 1) {
            $output .= '<a href="?type=status&operation=deactive&order_detail_id=' . $row['order_detail_id'] . '" class="btn btn-primary text-white btn-sm me-1">Active</a>';
        } else {
            $output .= '<a href="?type=status&operation=active&order_detail_id=' . $row['order_detail_id'] . '" class="btn btn-success text-white btn-sm me-1">Deactive</a>';
        }

        $output .= '</td>'; // Close the <td> tag here

        $output .= '<td>';
        $output .= '<a href="?type=delete&order_detail_id=' . $row['order_detail_id'] . '" onclick="return confirm(\'Are you sure you want to delete data?\')">';
        $output .= '<i class="feather-trash"></i>';
        $output .= '</a>';
        $output .= '<a class="btn btn-sm bg-danger-light" href="order_edit.php.php?type=update&order_detail_id=' . $row['order_detail_id'] . '">';
        $output .= '<i class="feather-edit"></i>';
        $output .= '</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output = '<tr><td colspan="8" align="center">No Data Found</td></tr>';
}

echo $output; // Output the generated HTML
?>