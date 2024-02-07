<?php 
include "../config.php"; 
if(!isset($_GET['id']) || $_GET['id']<=0 || $_GET['id']==""){
    die('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dish | Look My Cook</title>
    <style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    }</style>
</head>
<body><p style="width:100%;text-align:center;color:red;font-size:20px;padding:15px;">Something went wrong. Please <a href="dishes" id="back-btn">go back</a> and try again.</p></body></html>');
}else{
    $dish_id = $_GET['id'];
    $edit_query = "SELECT * FROM `menu_items` WHERE `menu_item_id`={$dish_id};";
    
            try {
                if($resulted_dish = mysqli_query($conn,$edit_query)){
                    if(mysqli_num_rows($resulted_dish)>0){
                        $dish_data = mysqli_fetch_assoc($resulted_dish);
                    }else{
                        die('<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Add Dish | Look My Cook</title>
                    <style>
                    *{
                    margin:0;
                    padding:0;
                    box-sizing:border-box;
                    }</style>
                </head>
                <body><p style="width:100%;text-align:center;color:red;font-size:20px;padding:15px;">Dish does not exist.</p></body></html>');
                    }
                    
                }else{
                    die('<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Add Dish | Look My Cook</title>
                    <style>
                    *{
                    margin:0;
                    padding:0;
                    box-sizing:border-box;
                    }</style>
                </head>
                <body><p style="width:100%;text-align:center;color:red;font-size:20px;padding:15px;">Something went wrong. Please try again later.</p></body></html>');
                }
            } catch (\Throwable $th) {
                
               
                
            }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/add_dish.css">
    <link rel="stylesheet" href="css/alert_box.css">
    <link rel="stylesheet" href="css/model_box.css">

    <link rel="stylesheet" href="css/toggle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>






    <!-- CONTENT -->

    <form id="dish_form" action="add_dish_" method="post" enctype="multipart/form-data">
        <label for="">Dish Name</label>
        <input type="text" placeholder="" id="dish_name" name="dish_name" required value="<?php echo $dish_data['menu_item_name']?>">

        <label for="">Price (INR)</label>
        <input type="number" placeholder="" id="dish_price" value="<?php echo $dish_data['menu_item_price']?>" name="dish_price" required>

        <label>Feature Image(to be updated)</label>
        <div class="file-upload">
            <input type="file" id="dish_image" name="dish_image" accept="image/*">
        </div>

        <label for="">Short Description</label>
        <input type="text" id="dish_short_desc" value="<?php echo $dish_data['menu_item_short_desc']?>" name="dish_short_desc" max="30" required>


        <label for="">Category / Cousine</label>
        <select name="cousine" id="cousine" required>
            <?php
                       $load_cousine = "SELECT `menu_c_id`, `menu_c_name` FROM `menu_categories`;";
                       if($load_cousine_result = mysqli_query($conn,$load_cousine)){
                       if(mysqli_num_rows($load_cousine_result)>0){
                           while($output_row = mysqli_fetch_assoc($load_cousine_result)){
                              if($output_row['menu_c_id']==$dish_data['menu_item_category']){
                                echo "<option selected value='".$output_row['menu_c_id']."'>".$output_row['menu_c_name']."</option>";
                              }else{
                                echo "<option value='".$output_row['menu_c_id']."'>".$output_row['menu_c_name']."</option>";
                              }
                           }
                       }else{
                        echo "<option value='empty' disabled>No cousine was found. Please add</option>";
                         }
                       }else{
                        echo "<option value='empty' disabled>Some issue has occured.</option>";
                       }
                    ?>
        </select>

        <label id="_radio_btn_">Choose One</label>
        <div class="_radio_btn_" id="_radio_btn__">
            
            <?php $array = ["appetizer","main_course","bread","rice","raita"];
            
            for($i=0;$i<2;$i++){
                if($dish_data['menu_item_appetizer']==$array[$i]){
                    echo '<div class="inputGroup">
                <input  checked id="'.$array[$i].'" value="'.$array[$i].'" name="radio" type="radio" />
                <label for="'.$array[$i].'">'.$array[$i].'</label>
            </div>';
                }else{
                    echo '<div class="inputGroup">
                <input id="'.$array[$i].'" value="'.$array[$i].'" name="radio" type="radio" />
                <label for="'.$array[$i].'">'.$array[$i].'</label>
            </div>';
                }
            }
            ?>
            <!--<div class="inputGroup">-->
            <!--    <input id="appetizer" value="appetizer" name="radio" type="radio" />-->
            <!--    <label for="appetizer">Appetizer</label>-->
            <!--</div>-->
            <!--<div class="inputGroup">-->
            <!--    <input id="main_course" checked value="main_course" name="radio" type="radio" />-->
            <!--    <label for="main_course">Main Course</label>-->
            <!--</div>-->

            <div id="more">
                <?php
                  for($j=2;$j<5;$j++){
                if($dish_data['menu_item_appetizer']==$array[$j]){
                    echo '<div class="inputGroup">
                <input  checked id="'.$array[$j].'" value="'.$array[$j].'" name="radio" type="radio" />
                <label for="'.$array[$j].'">'.$array[$j].'</label>
            </div>';
                }else{
                    echo '<div class="inputGroup">
                <input id="'.$array[$j].'" value="'.$array[$j].'" name="radio" type="radio" />
                <label for="'.$array[$j].'">'.$array[$j].'</label>
            </div>';
                }
            }
            ?>
                <!--<div class="inputGroup">-->
                <!--    <input id="bread" value="bread" name="radio" type="radio" />-->
                <!--    <label for="bread">Bread</label>-->
                <!--</div>-->
                <!--<div class="inputGroup">-->
                <!--    <input id="rice" value="rice" name="radio" type="radio" />-->
                <!--    <label for="rice">Rice</label>-->
                <!--</div>-->
                <!--<div class="inputGroup">-->
                <!--    <input id="raita" value="raita" name="radio" type="radio" />-->
                <!--    <label for="raita">Raita</label>-->
                <!--</div>-->
            </div>

        </div>


        <label for="">Select Type</label>
        <select name="dish_type" id="dish_type" required>
            <?php if($dish_data['menu_item_type']=="veg"){ ?>
            <option value="non_veg">Non Veg</option>
            <option value="veg" selected>Veg</option>
            <?php }else{ ?>
            <option value="non_veg" selected>Non-Veg</option>
            <option value="veg">Veg</option>
            <?php } ?>
        </select>

        <label for="">Excript</label>
        <textarea name="excript" id="excript" cols="30" rows="3" placeholder="">
            <?php echo $dish_data['menu_item_excript']?>
        </textarea>

        <label for="">About Dish</label>
        <textarea name="about" id="about" cols="30" rows="6" placeholder=""><?php echo $dish_data['menu_item_about']?></textarea>


        <div class="_btn_to_upload_appliance">
            <label>Appliances</label>
            <div class="_btn_appliance" id="add_appliance">Add Appliance</div>
        </div>

        <!-- multi-select 2-->
        <input type="hidden" name="appliances_" id="appliances_">
        <div class="_search_menus" id="_search_menus_2" tabindex="3">
            <div class="_select_from_list_" id="_select_from_list_2">
                <div class="_search_from_list">
                    <input type="search" name="search_term" id="_search_from_list_appliance" placeholder="Search here">
                </div>
                <div class="_select_able_container_list _select_able_container_list_2">

                   

                </div>
            </div>


            <div class="_selected_filters" id="_selected_filters_2">

                <div class="_filters _filters_2">
                   <?php
                   $dish_apps_query ="SELECT * FROM `used_appliances` INNER JOIN appliances ON used_appliances.appliance_id=appliances.appliance_id WHERE used_appliances.dish_id={$dish_data['menu_item_id']};"; 
                   
                   if($dish_appls = mysqli_query($conn,$dish_apps_query)){
                       if(mysqli_num_rows($dish_appls)>0){
                           while($selected_app_dish = mysqli_fetch_assoc($dish_appls)){
                               echo '<div class="_appended _appended_2" data-name="'.$selected_app_dish['appliance_name'].'" data-img="../uploads/appliances_images/'.$selected_app_dish['appliance_image'].'" data-id="'.$selected_app_dish['appliance_id'].'">
                            <span class="_appended_item _appended_item_2">'.$selected_app_dish['appliance_name'].'</span>
                            <p class="appended_close appended_close_2">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="appended_close_" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </p>
                        </div>';
                           }
                       }
                       
                   }
                   
                   ?>
                </div>
                <div class="_menu_suggestion_indicator">
                    <svg width="24" height="24" fill="" class="showing showing_2 bi bi-chevron-down"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- multi-select 2-->



        <div class="_btn_to_upload_appliance">
            <label>Ingredients</label>
            <div class="_btn_appliance" id="add_recipe">Add Recipe</div>
        </div>

        <!-- multi-select 1-->
        <input type="hidden" name="recipes_" id="recipes_">
        <div class="_search_menus" id="_search_menus_1" tabindex="3">
            <div class="_select_from_list_" id="_select_from_list_1">
                <div class="_search_from_list">
                    <input type="search" name="search_term" id="_search_from_list_recipe" placeholder="Search here">
                </div>
                <div class="_select_able_container_list" id="_select_able_container_list_1">

                </div>
            </div>


            <div class="_selected_filters" id="_selected_filters_1">

                <div class="_filters _filters_1">
                   <?php
                   $dish_resp_query ="SELECT * FROM `used_recipes` INNER JOIN recipes ON used_recipes.recipe_id=recipes.recipe_id WHERE used_recipes.dish_id={$dish_data['menu_item_id']};"; 
                   
                   if($dish_recipel = mysqli_query($conn,$dish_resp_query)){
                       if(mysqli_num_rows($dish_recipel)>0){
                           while($selected_app_dish = mysqli_fetch_assoc($dish_recipel)){
                               echo '<div class="_appended _appended_1" data-name="'.$selected_app_dish['recipe_name'].'" data-img="../uploads/recipe_images/'.$selected_app_dish['recipe_image'].'" data-id="'.$selected_app_dish['recipe_id'].'">
                            <span class="_appended_item _appended_item_1">'.$selected_app_dish['recipe_name'].'</span>
                            <p class="appended_close appended_close_1">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" viewBox="0 0 16 16">
                                    <path class="appended_close_" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </p>
                        </div>';
                           }
                       }
                       
                   }
                   
                   ?>
                </div>
                <div class="_menu_suggestion_indicator">
                    <svg width="24" height="24" fill="" class="showing showing_1 bi bi-chevron-down"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- multi-select 1-->

 <div style="display:flex;align-items:center;width:100%;justify-content:space-between;">
            <label>Chef Special</label>
             <div class="toggleWrapper">
                 <?php if($dish_data['is_chef_special']=="1"){ ?>
               <input type="checkbox" checked name="toggle1" class="mobileToggle" id="toggle1">
               <?php }else{ ?>
               <input type="checkbox" name="toggle1" class="mobileToggle" id="toggle1">
               <?php } ?>
               <label for="toggle1"></label>
          </div>
      </div>


        
         <input type=hidden name=dish_id value="<?php echo $dish_id;?>">
        <button type="submit" name="submit" id="add_dish__btnn">Update Dish</button>
    </form>

    <!-- CONTENT -->



    <!-- pop up for add new menu -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <div class="container_1">
                <form id="appliance_form" enctype="multipart/form-data">
                    <label for="appliance_name">Appliance Name:</label>
                    <input type="text" id="appliance_name" placeholder="Appliance Name" name="appliance_name" required>

                    

                    <button type="submit" name="submit" id="upload_appliance_data">Add</button>
                </form>
            </div>

            <div class="_btn_close_pop_up" id="_btn_close_pop_up"><i class="fa-solid fa-xmark"></i></div>
        </div>
    </div>
    <!-- pop up for add new menu -->

    <!-- pop up for add new recipe -->
    <div id="recipe_model" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <div class="container_1">
                <form id="recipe_form" enctype="multipart/form-data">
                    <label for="recipe_name">Ingredient Name:</label>
                    <input type="text" id="recipe_name" placeholder="Ingredient Name" name="recipe_name" required>

                    <button type="submit" name="submit" id="upload_recipe_data">Add</button>
                </form>
            </div>

            <div class="_btn_close_pop_up" id="recipe_model_close_pop_up"><i class="fa-solid fa-xmark"></i></div>
        </div>
    </div>
    <!-- pop up for add new recipe -->


    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->


      <!-- overlay -->
    <div class="over_lay"
        style="display:none;position: fixed; top: 0px;left: 0px;width: 100%;height: 100%;background: rgba(0,0,0,0.2);z-index: 100000;"
        id="overlay"></div>



    <?php include "dashboard_footer.php"; ?>


    <script>
    // update tax

    $(document).ready(function() {

        // select boxes
        
         var listtwo = $("._filters_2").children();
            if (listtwo.length === 0) {
                $("._filters_2").append('<div class="_place_holder_ _place_holder_2">Select from dropdown list</div>');
            }
            
            var listone = $("._filters_1").children();
            if (listone.length === 0) {
                $("._filters_1").append('<div class="_place_holder_ _place_holder_1">Select from dropdown list</div>');
            }


        $("._select_from_list_").slideUp();
       
       
        // select 1 show or hide
        $("#_selected_filters_1").click(function(e) {
            if (e.target.className.baseVal == "appended_close_" || e.target.className.baseVal ==
                "appended_close") {

            } else {
                $("#_select_from_list_2").slideUp("fast");
                $("#_search_menus_1").toggleClass("_focused_class");
                $("#_selected_filters_1 .showing_1").toggleClass("_focused_showing");
                $("#_select_from_list_1").slideToggle();
            }
        });

        $("#_selected_filters_2").click(function(e) {
            if (e.target.className.baseVal == "appended_close_" || e.target.className.baseVal ==
                "appended_close") {

            } else {
                $("#_select_from_list_1").slideUp("fast");
                $("#_search_menus_2").toggleClass("_focused_class");
                $("#_selected_filters_2 .showing_2").toggleClass("_focused_showing");
                $("#_select_from_list_2").slideToggle();
            }
        });
        // select 1 show or hide


        $(document).on("click", "._select_able_items_1", function() {
            $(this).detach();
            $("._place_holder_1").detach();
            $("._filters_1").append(`<div class="_appended _appended_1" data-name="` + $(this).children(
                    "._right_data_").children(".select_able_name").text() + `" data-img="` + $(this)
                .children("._img").children("img").attr("src") + `" data-id="` + $(this).attr(
                    "data-id") + `">
                            <span class="_appended_item _appended_item_1">` + $(this).children("._right_data_")
                .children(
                    ".select_able_name").text() + `</span>
                            <p class="appended_close appended_close_1">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" class="bi bi-x"
                                    viewBox="0 0 16 16">
                                    <path class="appended_close_"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </p>
                        </div>`);
            call_menu_loader1();
        });


        $(document).on("click", "._select_able_items_2", function() {
            $(this).detach();
            $("._place_holder_2").detach();
            $("._filters_2").append(`<div class="_appended _appended_2" data-name="` + $(this).children(
                    "._right_data_").children(".select_able_name").text() + `" data-img="` + $(this)
                .children("._img").children("img").attr("src") + `" data-id="` + $(this).attr(
                    "data-id") + `">
                            <span class="_appended_item _appended_item_2">` + $(this).children("._right_data_")
                .children(
                    ".select_able_name").text() + `</span>
                            <p class="appended_close appended_close_2">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" class="bi bi-x"
                                    viewBox="0 0 16 16">
                                    <path class="appended_close_"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </p>
                        </div>`);
            call_menu_loader2();
        });

        $(document).on("click", ".appended_close_1", function(e) {
            $(this).parent().detach();
            $("#_select_able_container_list_1").append(
                ` <div class="_select_able_items_ _select_able_items_1" data-id="` + $(this)
                .parent().attr("data-id") + `">
                            <div class="_img">
                                <img src="` + $(this).parent().attr("data-img") + `" alt="">
                            </div>
                            <div class="_right_data_">
                                <div class="select_able_name">` + $(this).parent().attr("data-name") + `</div>
                            </div>
                        </div>`);

            var list1 = $("._filters_1").children();
            if (list1.length === 0) {
                $("._filters_1").append(
                    '<div class="_place_holder_ _place_holder_1">Select from dropdown list</div>');
            }

            call_menu_loader1();
        });


        $(document).on("click", ".appended_close_2", function(e) {
            $(this).parent().detach();
            $("._select_able_container_list_2").append(
                `<div class="_select_able_items_ _select_able_items_2" data-id="` + $(this).parent()
                .attr("data-id") + `">
                            <div class="_img">
                                <img src="` + $(this).parent().attr("data-img") + `" alt="">
                            </div>
                            <div class="_right_data_">
                                <div class="select_able_name">` + $(this).parent().attr("data-name") + `</div>
                            </div>
                        </div>`);

            var list1 = $("._filters_2").children();
            if (list1.length === 0) {
                $("._filters_2").append(
                    '<div class="_place_holder_ _place_holder_2">Select from dropdown list</div>');
            }

            call_menu_loader2();
        });

        function call_menu_loader1() {
            var data_1 = "-1";
            var _appended_items_1 = $("._appended_item_1");
            $.each(_appended_items_1, function(i, val) {
                data_1 += "," + $(this).parent().attr("data-id");
            });
            $("#recipes_").val(data_1);

            // send data
            return data_1;
            // send data
        }
        
        call_menu_loader1();

        function call_menu_loader2() {
            var data_2 = "-1";
            var _appended_items_2 = $("._appended_item_2");
            $.each(_appended_items_2, function(i, val) {
                data_2 += "," + $(this).parent().attr("data-id");
            });
            $("#appliances_").val(data_2);
            // send data
            return data_2;
            // send data
        }

call_menu_loader2();

        // handle cousine or category
        $("#cousine").on("change", function() {
            appetizer_Setter($(this).val());
        });



        function appetizer_Setter(given) {
            if (given == "") {
                var given = $("#cousine").val();
            }
            const cousine__ = ["47", "2", "3", "4", "5", "6", "7", "14", "15", "27"];
            if (!cousine__.includes(given)) {

                $("#_radio_btn_").css("display", "none");
                $("#_radio_btn_+div").css("display", "none");
                $("#appetizer").attr("disabled", "disabled");
                $("#main_course").attr("disabled", "disabled");

            } else {
                $("#_radio_btn_").css("display", "block");
                $("#_radio_btn_+div").css("display", "block");
                $("#appetizer").removeAttr("disabled");
                $("#main_course").removeAttr("disabled");

                if (given == 47) {
                    $("#more").css("display", "block");
                    $("#more input").removeAttr("disabled");

                } else {
                    $("#more").css("display", "none");
                    $("#more input").attr("disabled", "true");
                }
            }
        }
        appetizer_Setter("");
        // handle cousine or category



        // select boxes

        // close | hide alert
        $(".closebtn").on("click", function() {
            $(this).parent().css("opacity", "0");
            setTimeout(function() {
                    $(".alert").css("display", "none");
                },
                600);
        });


        var myTimeout;
        var hide_alert_timeout;

        function hide_alert_auto() {
            $(".alert").css("opacity", "0");
            hide_alert_timeout = setTimeout(hide_alert(), 600);
        }

        function hide_alert() {
            $(".alert").css("display", "none");
        }

        // close | hide alert


        // hide - show popup/model box

        $("#myModal").css("display", "flex");
        $("#myModal").hide();
        $("#_btn_close_pop_up").click(function() {
            $("#myModal").hide();
        });

        $("#recipe_model").css("display", "flex");
        $("#recipe_model").hide();
        $("#recipe_model_close_pop_up").click(function() {
            $("#recipe_model").hide();
        });
        // hide - show popup/model box







        // image allowed formats

        var allowed_type = ["webp", "WEBP", "png", "PNG", "JPG", "jpg", "JPEG", "jpeg"];


        //__________appliance


        // load appliances function


        function __load_appliances(app_term) {
            var data_exclude_2 = call_menu_loader2();
            $.ajax({
                url: 'appliance_backend/load_appliance_select',
                type: 'POST',
                data: {
                    app_term: app_term,
                    data_exclude_2:data_exclude_2
                },
                success: function(loaded_appliances) {
                    if (loaded_appliances != "sql" && loaded_appliances != "no") {
                        $("._select_able_container_list_2").html(loaded_appliances);
                    }
                }
            });
        }
        __load_appliances("");


        // search appliance
        $("#_search_from_list_appliance").on("keyup", function() {
            __load_appliances($(this).val());
        });
        // search appliance


        // load appliances function


        $("#add_appliance").click(function() {
            $("#myModal").show();
        });


        // add appliance
        $('#appliance_form').submit(function(event) {
            event.preventDefault();

           

           
                    $.ajax({
                        type: 'POST',
                        url: 'appliance_backend/upload_appliances',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(){
                             $("#overlay").css("display","flex");
                        },
                        success: function(res) {
                             $("#overlay").css("display","none");
                            console.log(res);
                            if (res == 1) {
                                $(".alert").css("background", "#04AA6D");
                                $(".alert ._message_").html(
                                    "<strong>Success!</strong>&nbsp;Appliance added Successfully."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                                $('#appliance_image').val("");
                                $('#appliance_name').val("");

                                $("#myModal").hide();
                                __load_appliances();

                            } else if (res == 0) {

                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;There is an error. Please try later."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                            } else if (res == "dup") {
                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;Appliance with this name already exist"
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);
                                $('#appliance_name').focus();
                            } else {
                                alert(res);
                            }
                        }
                    });



        });

        // add appliance

        //__________appliance



        //__________recipe


        // load recipes function
        function __load_recipes(term) {
            var data_exclude_1 = call_menu_loader1();
            $.ajax({
                url: 'recipe_backend/load_recipes_select',
                type: 'POST',
                data: {
                    term: term,
                    data_exclude_1:data_exclude_1
                },
                success: function(loaded_recipes) {
                    if (loaded_recipes != "sql" && loaded_recipes != "no") {
                        $("#_select_able_container_list_1").html(loaded_recipes);
                    }
                }
            });
        }
        __load_recipes("");
        // load recipes function


        // search recipe
        $("#_search_from_list_recipe").on("keyup", function() {
            __load_recipes($(this).val());
        });
        // search recipe

        $("#add_recipe").click(function() {
            $("#recipe_model").show();
        });


        // add recipe
        $('#recipe_form').submit(function(evnt) {
            evnt.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'recipe_backend/upload_recipes',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                         beforeSend:function(){
                             $("#overlay").css("display","flex");
                        },
                        success: function(resp) {
                             $("#overlay").css("display","none");
                            if (resp == 1) {
                                $(".alert").css("background", "#04AA6D");
                                $(".alert ._message_").html(
                                    "<strong>Success!</strong>&nbsp;Ingredient added Successfully."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                                $('#recipe_image').val("");
                                $('#recipe_name').val("");

                                $("#recipe_model").hide();
                                __load_recipes();

                            } else if (resp == 0) {

                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;There is an error. Please try later."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);

                            } else if (resp == "dup") {
                                $(".alert").css("background", "#f44336")
                                $(".alert ._message_").html(
                                    "<strong>ERROR!</strong>&nbsp;Ingredient with this name already exist."
                                );
                                $(".alert").css("display", "flex");
                                $(".alert").css("opacity", "1");
                                myTimeout = setTimeout(hide_alert_auto, 4000);
                                $('#recipe_name').focus();
                            } else {
                                alert(resp);
                            }
                        }
                    });


               


        });

        // add recipe
        //__________recipe



        // _____________________________ajax => add menu_______________________________

        $('#dish_form').submit(function(ee) {
            ee.preventDefault();

            if (parseInt($("#dish_price").val()) < 0) {

                $(".alert").css("background", "#f44336");
                $(".alert ._message_").html(
                    "<strong>ERROR!</strong>&nbsp;Dish price can't be negative"
                );
                $(".alert").css("display", "flex");
                $(".alert").css("opacity", "1");
                myTimeout = setTimeout(hide_alert_auto, 4000);
                $("#dish_price").focus();
            } else {
                $("#dish_price").blur();
               
                var dish_image_name = $('#dish_image').val();
                var empty_dish = false;
                
                if(dish_image_name==""){
                  empty_dish = true;
                }else{
                  empty_dish = false;
                  var dish_image_size = $('#dish_image')[0].files[0].size;
                }

                var dish_image_ext = dish_image_name.substr((dish_image_name.lastIndexOf('.') + 1));


                if (allowed_type.includes(dish_image_ext) || empty_dish==true) {
                    $("#dish_image").css("border", "1px solid #c5c5c5");
                    var valid_ity = false;
                    var valid_size = false;
                    if (dish_image_size <= 1024000 || empty_dish==true) {
                        $("#dish_image").css("border", "1px solid #c5c5c5");




                       

                                // ajax request

                                $.ajax({
                                    type: 'POST',
                                    url: 'dishes_backend/update_dish',
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    beforeSend:function(){
                                      $("#overlay").css("display","flex");
                                      $("#add_dish__btnn").text("Updating...");
                                      $("#add_dish__btnn").attr("disabled","disabled");
                                      $("#add_dish__btnn").css("cursor","not-allowed");
                                    },
                                    success: function(respp) {
                                         $("#overlay").css("display","none");
                                         
                                        console.log(respp);
                                        $("#add_dish__btnn").text("Update Dish");
                                      $("#add_dish__btnn").removeAttr("disabled");
                                      $("#add_dish__btnn").css("cursor","pointer");

                                        if (respp == 1) {
                                            $(".alert").css("background", "#04AA6D");
                                            $(".alert ._message_").html(
                                                "<strong>Success!</strong>&nbsp;Dish updated Successfully."
                                            );
                                            $(".alert").css("display", "flex");
                                            $(".alert").css("opacity", "1");
                                            myTimeout = setTimeout(hide_alert_auto, 4000);

                                            // window.location.reload();
                                            

                                        } else if (respp == "dup") {
                                            $(".alert").css("background", "#f44336");
                                            $(".alert ._message_").html(
                                                "<strong>ERROR!</strong>&nbsp;Dish with this name already exist"
                                            );
                                            $(".alert").css("display", "flex");
                                            $(".alert").css("opacity", "1");
                                            myTimeout = setTimeout(hide_alert_auto, 4000);


                                        } else {

                                            // $(".alert").css("background", "#f44336");
                                            // $(".alert ._message_").html(
                                            //     "<strong>ERROR!</strong>&nbsp;Something went wrong. Please try later."
                                            // );
                                            // $(".alert").css("display", "flex");
                                            // $(".alert").css("opacity", "1");
                                            // myTimeout = setTimeout(hide_alert_auto, 4000);
                                           

                                        }

                                    }
                                });
                                // ajax request


                           



                    } else {
                        $("#dish_image").css("border", "1px solid red");
                        $(".alert").css("background", "#f44336");
                        $(".alert ._message_").html(
                            "<strong>ERROR!</strong>&nbsp;File size exceeding from 1 MB."
                        );
                        $(".alert").css("display", "flex");
                        $(".alert").css("opacity", "1");
                        myTimeout = setTimeout(hide_alert_auto, 4000);

                    }


                } else {
                    $("#dish_image").css("border", "1px solid red");
                    $(".alert").css("background", "#f44336");
                    $(".alert ._message_").html(
                        "<strong>ERROR!</strong>&nbsp;Allowed formats are 'webp/png/jpg/jpeg'."
                    );
                    $(".alert").css("display", "flex");
                    $(".alert").css("opacity", "1");
                    myTimeout = setTimeout(hide_alert_auto, 4000);
                }


            }

        });

        // _____________________________ajax => add menu_______________________________

    });
    
    
    </script>
</body>

</html>