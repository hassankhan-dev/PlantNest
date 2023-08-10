<?php
include("./config.php");
if($_POST['type']=='load'){
    $result = "";
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants ");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        <a href='cart.html' class='btn product-cart'>Add to Cart</a>
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['description']}</p>
                        <div class='button-listview'>
                            <a href='cart.html' class='btn product-cart button-icon flosun-button dark-btn' data-toggle='tooltip' data-placement='top' title='Add to Cart'> <span>Add to Cart</span> </a>
                            <a class='list-icon' href='compare.html' title='Compare'>
                                <i class='lnr lnr-sync' data-toggle='tooltip' data-placement='top' title='Compare'></i>
                            </a>
                            <a class='list-icon' href='wishlist.html' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='top' title='Wishlist'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}
?>