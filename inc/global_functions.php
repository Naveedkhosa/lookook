<?php

/**
 * get all banners 
 * 
 */
function getBanners()
{
    global $conn;
    $banners_sql = "SELECT * FROM banners;";
    if ($banners_result = mysqli_query($conn, $banners_sql)) {
        if(mysqli_num_rows($banners_result) > 0){
            return mysqli_fetch_all($banners_result,MYSQLI_ASSOC);
        }else{
            return false;
        }
    } else {
        return false;
    }
}

/**
 * get user option
 */
function getUserOption($option)
{
    global $conn;
    $sql = "SELECT option_value FROM user_options WHERE option_name='{$option}';";
    if ($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result)['option_value'];
        }else{
            return 0;
        }
    } else {
        return 0;
    }
}

