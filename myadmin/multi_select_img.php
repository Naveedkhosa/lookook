<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="../static/css/our_menu.css">
    

</head>

<body>


    <div class="_menu_container_">
        <div class="_inner__handler">
            <div class="_heading_title_">
                OUR MENU
            </div>

            <!-- field 1 -->
            <div class="_fields">
                <label>Cocktails</label>
                <div class="_search_menus _search_menus_11" tabindex="3">
                    <div class="_select_from_list_ _select_from_list__11">
                        <div class="_search_from_list">
                            <input type="search" name="search_term" id="_search_from_list_11" placeholder="Search here">
                        </div>
                        <div class="_select_able_container_list" id="_select_able_container_list_11">


                            <div class="_select_able_items_ _select_able_items__11">
                                <div class="_img">
                                    <img src="../static/images/p2_11zon_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Mutter</div>
                                    <div class="dish_price">10 INR</div>
                                </div>
                            </div>


                            <div class="_select_able_items_ _select_able_items__11">
                                <div class="_img">
                                    <img src="../static/images/p1_11zon_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Aluo Gobhi</div>
                                    <div class="dish_price">250 INR</div>
                                </div>
                            </div>


                            <div class="_select_able_items_ _select_able_items__11">
                                <div class="_img">
                                    <img src="../static/images/cleaner_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Mutton Kadhai</div>
                                    <div class="dish_price">3000 INR</div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="_selected_filters _selected_filters_11">

                        <div class="_filters _filters_11">

                        </div>
                        <div class="_menu_suggestion_indicator">
                            <svg width="24" height="24" fill="" class="showing bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>




                </div>
            </div>
            <!-- field 1 -->




            <!-- field 2 -->
            <div class="_fields">
                <label>Mocktails</label>
                <div class="_search_menus _search_menus_12" tabindex="3">
                    <div class="_select_from_list_ _select_from_list__12">
                        <div class="_search_from_list">
                            <input type="search" name="search_term" id="_search_from_list_12" placeholder="Search here">
                        </div>
                        <div class="_select_able_container_list" id="_select_able_container_list_12">


                            <div class="_select_able_items_ _select_able_items__12">
                                <div class="_img">
                                    <img src="../static/images/p2_11zon_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Mutter</div>
                                    <div class="dish_price">10 INR</div>
                                </div>
                            </div>


                            <div class="_select_able_items_ _select_able_items__12">
                                <div class="_img">
                                    <img src="../static/images/p1_11zon_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Aluo Gobhi</div>
                                    <div class="dish_price">250 INR</div>
                                </div>
                            </div>


                            <div class="_select_able_items_ _select_able_items__12">
                                <div class="_img">
                                    <img src="../static/images/cleaner_11zon.webp" alt="">
                                </div>
                                <div class="_right_data_">
                                    <div class="select_able_name">Mutton Kadhai</div>
                                    <div class="dish_price">3000 INR</div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="_selected_filters _selected_filters_12">

                        <div class="_filters _filters_12">

                        </div>
                        <div class="_menu_suggestion_indicator">
                            <svg width="24" height="24" fill="" class="showing bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>




                </div>
            </div>
            <!-- field 1 -->




        </div>
    </div>


    <script src="../static/js/jquery.js"></script>
    <script>
    $(document).ready(function() {


        // field_1 _________________________ field-no.1
        $("._select_from_list__11").slideUp();
        $("._filters_11").append(
            '<div class="_place_holder_ _place_holder_11">Select from dropdown list</div>');

        $("._selected_filters_11").click(function(e) {


            if (e.target.className.baseVal == "appended_close_" || e.target.className.baseVal ==
                "appended_close") {

            } else {
                $("._search_menus_11").toggleClass("_focused_class");
                $("._selected_filters_11 .showing").toggleClass("_focused_showing");
                $("._select_from_list__11").slideToggle();

            }


        });




        $(document).on("click", "._select_able_items__11", function() {
            $(this).detach();
            $("._place_holder_11").detach();
            $("._filters_11").append(
                `<div class="_appended" data-name="` + $(this)
                .children(
                    "._right_data_").children(".select_able_name").text() + `" data-price="` + $(
                    this).children("._right_data_").children(".dish_price").text() +
                `" data-img="` + $(this).children("._img").children("img").attr("src") + `">
                            <span class="_appended_item">` + $(this).children("._right_data_").children(
                    ".select_able_name").text() + ` (` + $(this).children("._right_data_").children(
                    ".dish_price").text() + `)</span>
                            <p class="appended_close appended_close_11">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" class="bi bi-x"
                                    viewBox="0 0 16 16">
                                    <path class="appended_close_"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </p>
                        </div>`);
            call_menu_loader1();
        });



        $(document).on("click", ".appended_close_11", function(e) {
            $(this).parent().detach();
            $("#_select_able_container_list_11").append(`<div class="_select_able_items_ _select_able_items__11">
                            <div class="_img">
                                <img src="` + $(this).parent().attr("data-img") + `" alt="">
                            </div>
                            <div class="_right_data_">
                                <div class="select_able_name">` + $(this).parent().attr("data-name") + `</div>
                                <div class="dish_price">` + $(this).parent().attr("data-price") + `</div>
                            </div>
                        </div>`);

            var list = $("._filters_11").children();
            if (list.length === 0) {
                $("._filters_11").append(
                    '<div class="_place_holder_ _place_holder_11">Select from dropdown list</div>');
            }
            call_menu_loader1();
        });


        // field_1 _________________________ field-no.1




        // field_1 _________________________ field-no.1
        $("._select_from_list__12").slideUp();
        $("._filters_12").append(
            '<div class="_place_holder_ _place_holder_12">Select from dropdown list</div>');

        $("._selected_filters_12").click(function(e) {


            if (e.target.className.baseVal == "appended_close_" || e.target.className.baseVal ==
                "appended_close") {

            } else {
                $("._search_menus_12").toggleClass("_focused_class");
                $("._selected_filters_12 .showing").toggleClass("_focused_showing");
                $("._select_from_list__12").slideToggle();

            }


        });




        $(document).on("click", "._select_able_items__12", function() {
            $(this).detach();
            $("._place_holder_12").detach();
            $("._filters_12").append(
                `<div class="_appended" data-name="` + $(this)
                .children(
                    "._right_data_").children(".select_able_name").text() + `" data-price="` + $(
                    this).children("._right_data_").children(".dish_price").text() +
                `" data-img="` + $(this).children("._img").children("img").attr("src") + `">
                            <span class="_appended_item">` + $(this).children("._right_data_").children(
                    ".select_able_name").text() + ` (` + $(this).children("._right_data_").children(
                    ".dish_price").text() + `)</span>
                            <p class="appended_close appended_close_12">
                                <svg class="appended_close_" width="20" height="30" fill="currentColor" class="bi bi-x"
                                    viewBox="0 0 16 16">
                                    <path class="appended_close_"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </p>
                        </div>`);
            call_menu_loader1();
        });



        $(document).on("click", ".appended_close_12", function(e) {
            $(this).parent().detach();
            $("#_select_able_container_list_12").append(`<div class="_select_able_items_ _select_able_items__12">
                            <div class="_img">
                                <img src="` + $(this).parent().attr("data-img") + `" alt="">
                            </div>
                            <div class="_right_data_">
                                <div class="select_able_name">` + $(this).parent().attr("data-name") + `</div>
                                <div class="dish_price">` + $(this).parent().attr("data-price") + `</div>
                            </div>
                        </div>`);
                        console.log("ok");

            var list = $("._filters_12").children();
            if (list.length === 0) {
                $("._filters_12").append(
                    '<div class="_place_holder_ _place_holder_12">Select from dropdown list 2</div>');
            }
            call_menu_loader1();
        });


        // field_1 _________________________ field-no.1

        function call_menu_loader1() {
            var data = "no";
            var _appended_items = $("._appended_item");
            $.each(_appended_items, function(i, val) {
                data += "," + $(this).text();
            });

            // load_menu_items(data);
            // send data
            // return data;
            console.log(data);
            // send data
        }

        // load menu items
        function load_menu_items(menu_categories_to_be_filter) {

            // $.ajax({
            //     url: "backend/our_menu/load_menu_items",
            //     type: "post",
            //     data:{menu_categories_to_be_filter:menu_categories_to_be_filter},
            //     beforeSend: function() {
            //         console.log("loading...");
            //     },
            //     success: function(menu_categories_filtered_data) {
            //        if(menu_categories_filtered_data =="zero"){
            //            $("#_menu_items_id_").html("<p style='width:100%;text-align:center;color:red;'>Some critical issue has occured....</p>");

            //        }else if(menu_categories_filtered_data =="sql"){
            //            $("#_menu_items_id_").html("<p style='width:100%;text-align:center;color:red;'>Some critical issue has occured....</p>");
            //        }else{
            //         $("#_menu_items_id_").html1(menu_categories_filtered_data);
            //        }
            //     }
            // });

        }
        // load menu items

        // load select able elements
        // function load_select_able_items1(serach_clause){
        //     var _selected_items1 = call_menu_loader1();
        //     $.ajax({
        //         url: "backend/our_menu/our_menu_load",
        //         type: "post",
        //         data:{where_clause:serach_clause,_selected_items1:_selected_items},
        //         beforeSend: function() {
        //             $("._select_able_container_list").html("<p style='width:100%;text-align:center;color:red;'>loading....</p>");
        //         },
        //         success: function(_select_able_container_data) {
        //             if(_select_able_container_data=="zero"){
        //                 $("._select_able_container_list").html("");
        //             }else if(_select_able_container_data=="sql"){
        //                 $("._select_able_container_list").html("<p style='width:100%;text-align:center;color:red;'>Some critical issue has occured....</p>");
        //             }else{
        //                 $("._select_able_container_list").html(_select_able_container_data);
        //             }
        //         }
        //     });
        // }

        // load_select_able_items1("");

        // load select able elements


        // search_select able elements
        //   $("#_search_from_list").on("keyup",function(){
        //    var search_term1 = $(this).val();
        //    load_select_able_items1(search_term1);
        //   });
        // search_select able elements






    });
    </script>
</body>

</html>