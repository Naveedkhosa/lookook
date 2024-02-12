setupCounter('minusButton1', 'plusButton1', 'displayedNumber1');
setupCounter('minusButton2', 'plusButton2', 'displayedNumber2');
setupCounter('minusButton3', 'plusButton3', 'displayedNumber3');
setupCounter('minusButton4', 'plusButton4', 'displayedNumber4');
setupCounter('minusButton5', 'plusButton5', 'displayedNumber5');
setupCounter('minusButton6', 'plusButton6', 'displayedNumber6');
setupCounter('minusButton7', 'plusButton7', 'displayedNumber7');
setupCounter('minusButton11', 'plusButton11', 'displayedNumber11', 'event_addon_waiter');
setupCounter('minusButton12', 'plusButton12', 'displayedNumber12', 'event_addon_cleaner');
setupCounter('minusButton13', 'plusButton13', 'displayedNumber13', 'event_addon_bartender');



/**
 * Guests Handling for chef
 * 
 */

$("#confirm_guests").on("click", function () {
    var childrens = 0;
    var adults = 1;

    adults = parseInt($("#displayedNumber5").attr("data-val"));
    childrens = parseInt($("#displayedNumber6").attr("data-val"));

    if (adults > 0) {
        $("#event_adults").val(adults);
        $("#event_childrens").val(childrens);

        if (childrens > 0) {
            if (adults > 1) {
                if (childrens > 1) {
                    $("#number_of_people").text(adults + " Adults & " + childrens + " Childrens");
                } else {
                    $("#number_of_people").text(adults + " Adults & " + childrens + " Children");
                }

            } else {
                if (childrens > 1) {
                    $("#number_of_people").text(adults + " Adult & " + childrens + " Childrens");
                } else {
                    $("#number_of_people").text(adults + " Adult & " + childrens + " Children");
                }
            }
        } else {
            if (adults > 1) {
                $("#number_of_people").text(adults + " Adults");
            } else {
                $("#number_of_people").text(adults + " Adult");
            }
        }
        $("#modal2 .close").click();

        calculateChefBill();
    }
});



// select dishes - now
$("#selectDishesNow").on("click", function (e) {
    e.preventDefault();
    var menu_starters_count = parseInt($("#displayedNumber1").attr("data-val"));
    var menu_main_course_count = parseInt($("#displayedNumber2").attr("data-val"));
    var menu_breads_and_rice_count = parseInt($("#displayedNumber3").attr("data-val"));
    var menu_soup_and_bev_count = parseInt($("#displayedNumber4").attr("data-val"));
    var menu_desserts_count = parseInt($("#displayedNumber7").attr("data-val"));

    var input__html = [];


    if (menu_starters_count > 0) {
        input__html.push(menu_starters_count + " Starter");
    }

    if (menu_main_course_count > 0) {
        input__html.push(menu_main_course_count + " Main Course");
    }

    if (menu_breads_and_rice_count > 0) {
        input__html.push(menu_breads_and_rice_count + " Bread and Rice");
    }

    if (menu_soup_and_bev_count > 0) {
        input__html.push(menu_soup_and_bev_count + " Soups and Beverages");
    }

    if (menu_desserts_count > 0) {
        input__html.push(menu_desserts_count + " Dessert");
    }

    $("#menu_starters_count").val(menu_starters_count);
    $("#menu_main_course_count").val(menu_main_course_count);
    $("#menu_breads_and_rice_count").val(menu_breads_and_rice_count);
    $("#menu_soup_and_bev_count").val(menu_soup_and_bev_count);
    $("#menu_desserts_count").val(menu_desserts_count);

    $("#displayedNumber_starters").text(menu_starters_count);
    $("#displayedNumber_main_course").text(menu_main_course_count);
    $("#displayedNumber_breads_and_rice").text(menu_breads_and_rice_count);
    $("#displayedNumber_soup_and_bev").text(menu_soup_and_bev_count);
    $("#displayedNumber_desserts").text(menu_desserts_count);

    if(selected_dishes.startersArray.length==0){
        
    }
    if(selected_dishes.soup_and_bevArray.length==0){

    }
    if(selected_dishes.breads_and_riceArray.length==0){

    }
    if(selected_dishes.main_courseArray.length==0){

    }
    if(selected_dishes.dessertsArray.length==0){

    }
   

    $("#select_no_of_dishes").text(input__html.toString());
    closePopup("modal1");

    loadStarters();


    openPopup("popupContainer120");
});

// select dishes later
$("#selectDishesLatter").on("click", function () {
    var menu_starters_count = parseInt($("#displayedNumber1").attr("data-val"));
    var menu_main_course_count = parseInt($("#displayedNumber2").attr("data-val"));
    var menu_breads_and_rice_count = parseInt($("#displayedNumber3").attr("data-val"));
    var menu_soup_and_bev_count = parseInt($("#displayedNumber4").attr("data-val"));
    var menu_desserts_count = parseInt($("#displayedNumber7").attr("data-val"));

    var input__html = [];

    if (menu_starters_count > 0) {
        input__html.push(menu_starters_count + " Starter");
    }

    if (menu_main_course_count > 0) {
        input__html.push(menu_main_course_count + " Main Course");
    }

    if (menu_breads_and_rice_count > 0) {
        input__html.push(menu_breads_and_rice_count + " Bread and Rice");
    }

    if (menu_soup_and_bev_count > 0) {
        input__html.push(menu_soup_and_bev_count + " Soups and Beverages");
    }

    if (menu_desserts_count > 0) {
        input__html.push(menu_desserts_count + " Dessert");
    }

    $("#menu_starters_count").val(menu_starters_count);
    $("#menu_main_course_count").val(menu_main_course_count);
    $("#menu_breads_and_rice_count").val(menu_breads_and_rice_count);
    $("#menu_soup_and_bev_count").val(menu_soup_and_bev_count);
    $("#menu_desserts_count").val(menu_desserts_count);

    $("#dishes_charges").val(0);
    $("#dishes_charges").attr("data-dishes", "");
    selected_dishes.startersArray= [];
    selected_dishes.soup_and_bevArray=[];
    selected_dishes.breads_and_riceArray=[];
    selected_dishes.dessertsArray=[];
    selected_dishes.main_courseArray=[];

    $("#select_no_of_dishes").text(input__html.toString());
    closePopup("modal1");
});

setupCounter('minusButton_starters', 'plusButton_starters', 'displayedNumber_starters', 'menu_starters_count');
setupCounter('minusButton_main_course', 'plusButton_main_course', 'displayedNumber_main_course', 'menu_main_course_count');
setupCounter('minusButton_breads_and_rice', 'plusButton_breads_and_rice', 'displayedNumber_breads_and_rice', 'menu_breads_and_rice_count');
setupCounter('minusButton_soup_and_bev', 'plusButton_soup_and_bev', 'displayedNumber_soup_and_bev', 'menu_soup_and_bev_count');
setupCounter('minusButton_desserts', 'plusButton_desserts', 'displayedNumber_desserts', 'menu_desserts_count');




/**
 * load Starters
 */
var active_menu = "starters";
var start = -10;
var limit = 10;
var total = 10;
var started = false;
var is_loading = false;



var selected_dishes = {
    startersArray: [],
    soup_and_bevArray: [],
    breads_and_riceArray: [],
    dessertsArray: [],
    main_courseArray: [],
};

function loadStarters(serach_keyword = "", menu_type = "starters") {
    if (total > start) {
        start = start + limit;

        var dish_type = "both";
        var veg = $("#" + menu_type + "_veg_toggle").prop("checked");
        var non_veg = $("#" + menu_type + "_non_veg_toggle").prop("checked");
        if (veg && !non_veg) {
            dish_type = "veg";
        } else if (!veg && non_veg) {
            dish_type = "non_veg";
        } else {
            dish_type = "both"
        }

        var url = "ajax_calls/dishes_loading/load_starters";
        if (menu_type == "soup_and_bev") {
            url = "ajax_calls/dishes_loading/load_soup_and_bev";
        } else if (menu_type == "main_course") {
            url = "ajax_calls/dishes_loading/load_main_course";
        } else if (menu_type == "desserts") {
            url = "ajax_calls/dishes_loading/load_desserts";
        } else if (menu_type == "breads_and_rice") {
            url = "ajax_calls/dishes_loading/load_breads_and_rice";
        }

        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                start: start,
                search: serach_keyword,
                item_type: dish_type
            },
            beforeSend: function () {
                $("#" + menu_type + "_dishes").append(`<div class="loading" id="${menu_type}_loading"></div>`);
                is_loading = true;
            },
            success: function (resp) {
                is_loading = false;
                console.log(resp);
                $(`#${menu_type}_loading`).remove();

                if (resp.success) {
                    if ("total" in resp) {
                        total = resp.total;
                        $("#" + menu_type + "_dishes").html("");
                    }
                    start = resp.start;
                    limit = resp.limit;

                    var is_added_class = "";
                    var btn_content = "";



                    resp.dishes.forEach(dish_item => {

                        if ($.inArray(parseInt(dish_item.menu_item_id), selected_dishes[menu_type + "Array"]) !== -1) {
                            is_added_class = " added";
                            btn_content = "Added";
                        } else {
                            is_added_class = "";
                            btn_content = "Add";
                        }

                        var veg_non_veg_idic = "";

                        if (dish_item.menu_item_type == "veg") {
                            veg_non_veg_idic = '<span class="veg_box"></span>';
                        } else if (dish_item.menu_item_type == "non_veg") {
                            veg_non_veg_idic = '<span class="non_veg_box"></span>';
                        }


                        $("#" + menu_type + "_dishes").append(`<!-- dish card -->
                            <div class="tab_card">
                                <div class="tabcard_center">
                                <div class="tabimg">
                                    <img loading="lazy" src="uploads/feature_imgs/${dish_item.menu_item_feature_img}" alt="${dish_item.menu_item_name}">
                                </div>
                                <p class="para_p">${veg_non_veg_idic}&nbsp;${dish_item.menu_item_name}</p>
                                <div class="tab_c_b_pric">
                                    <p>&#x20B9;${dish_item.menu_item_price}</p>
                                    <button class="add_btn${is_added_class}" data-id="${dish_item.menu_item_id}" data-price="${dish_item.menu_item_price}" data-type="${menu_type}">${btn_content}</button>
                                </div>
                                </div>
                            </div>
                            <!-- dish card -->`);
                    });

                } else {
                    if ("zero" in resp) {
                        $("#" + menu_type + "_dishes").html(`<!-- no dishes -->
                        <div class="zero_dishes">
                          <svg width="48" height="48" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" d="M6.5 6.5h16v.25l-.168.434c-1.425 3.681-2.322 8.12-2.668 12.316l-.01.155M14 23.5h5.5v-.155c0-.442.007-.89.021-1.345M17.5 6.5V6A5.5 5.5 0 0 1 23 .5M.5.5l19.155 19.155M23.5 23.5l-3.845-3.845M1.5 17.5v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1zm.5 0h9a1.5 1.5 0 0 1 0 3H2a1.5 1.5 0 0 1 0-3Zm-.5 3v3h10v-3z" />
                          </svg>
                          <div class="no_dishes_error">
                            No dish was found
                          </div>
                        </div>`);
                    }
                }
            },
            error: function () {
                $("#" + menu_type + "_dishes").html(`<!-- network error -->
                <div class="network_error_dishes" style="display:none;">
                  <svg width="48" height="48" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round">
                      <circle cx="12" cy="12" r="9.5" />
                      <path d="M8.209 16.622c.421-.365.999-.646 1.652-.834A7.807 7.807 0 0 1 12 15.5c.744 0 1.48.098 2.139.288c.654.188 1.23.469 1.652.834" />
                      <circle cx="9" cy="10" r="1" fill="currentColor" />
                      <circle cx="15" cy="10" r="1" fill="currentColor" />
                    </g>
                  </svg>
                  <div class="error_box">
                    Something went wrong, Please <div class="reload_btn">reload</div>
                  </div>
                </div>`);
            }
        });
    } else {
        $(`#${menu_type}_loading`).remove();
    }
}

// select dishes
$(document).on("click", ".add_btn", function () {
    var dishes_charges = parseInt($("#dishes_charges").val());

    var item_id = parseInt($(this).attr("data-id"));
    var item_type = $(this).attr("data-type");
    var item_price = parseInt($(this).attr("data-price"));

    var allowed_counts = $("#menu_" + item_type + "_count").val();
    var selected_counts = selected_dishes[item_type + "Array"].length;




    if ($.inArray(item_id, selected_dishes[item_type + "Array"]) !== -1) {
        selected_dishes[item_type + "Array"].splice($.inArray(item_id, selected_dishes[item_type + "Array"]), 1);
        $(this).removeClass("added");
        $(this).text("Add");
        dishes_charges -= item_price;
    } else {
        if (selected_counts < allowed_counts) {
            selected_dishes[item_type + "Array"].push(item_id);
            $(this).addClass("added");
            $(this).text("Added");
            dishes_charges += item_price;
        }
    }

    $("#dishes_charges").val(dishes_charges);
    $("#dishes_charges").attr("data-dishes", JSON.stringify(selected_dishes));

});



// close dishes popup
$("#closeDishesPopup").on("click", function () {
    var startersArray_length = selected_dishes.startersArray.length;
    var soup_and_bevArray_length = selected_dishes.soup_and_bevArray.length;
    var breads_and_riceArray_length = selected_dishes.breads_and_riceArray.length;
    var dessertsArray_length = selected_dishes.dessertsArray.length;
    var main_courseArray_length = selected_dishes.main_courseArray.length;

    var input__html = [];

    if (startersArray_length > 0) {
        input__html.push(startersArray_length + " Starter");
    }

    if (main_courseArray_length > 0) {
        input__html.push(main_courseArray_length + " Main Course");
    }

    if (breads_and_riceArray_length > 0) {
        input__html.push(breads_and_riceArray_length + " Bread and Rice");
    }

    if (soup_and_bevArray_length > 0) {
        input__html.push(soup_and_bevArray_length + " Soups and Beverages");
    }

    if (dessertsArray_length > 0) {
        input__html.push(dessertsArray_length + " Dessert");
    }

    $("#menu_starters_count").val(startersArray_length);
    $("#menu_main_course_count").val(main_courseArray_length);
    $("#menu_breads_and_rice_count").val(breads_and_riceArray_length);
    $("#menu_soup_and_bev_count").val(soup_and_bevArray_length);
    $("#menu_desserts_count").val(dessertsArray_length);

    $("#displayedNumber1").text(startersArray_length);
    $("#displayedNumber1").attr("data-val",startersArray_length);

    $("#displayedNumber2").text(main_courseArray_length);
    $("#displayedNumber2").attr("data-val",main_courseArray_length);

    $("#displayedNumber3").text(breads_and_riceArray_length);
    $("#displayedNumber3").attr("data-val",breads_and_riceArray_length);

    $("#displayedNumber4").text(soup_and_bevArray_length);
    $("#displayedNumber4").attr("data-val",soup_and_bevArray_length);

    $("#displayedNumber7").text(dessertsArray_length);
    $("#displayedNumber7").attr("data-val",dessertsArray_length);
    
    
    
    $("#select_no_of_dishes").text(input__html.length > 0 ? input__html.toString() : "Select number of dishes");

    closePopup("popupContainer120");


});

// toggle veg or non veg
$(".toggle_input").on("change", function () {
    start = -10;
    limit = 10;
    total = 10;
    started = false;
    is_loading = false;
    search_term = $("#searchbar").val();
    console.log(active_menu);
    $("#" + active_menu + "_dishes").html("");
    loadStarters(search_term, active_menu);
});

// load more  - lazy loading
document.addEventListener('scroll', function (event) {
    if (event.target.id === active_menu && !is_loading) {
        if (Math.ceil(document.getElementById(active_menu).scrollTop + document.getElementById(active_menu).offsetHeight) >= document.getElementById(active_menu).scrollHeight - 40) {
            loadStarters($("#searchbar").val(), active_menu);
        }
    }
}, true);




$("#searchbar").on("input", function () {
    start = -10;
    limit = 10;
    total = 10;
    started = false;
    is_loading = false;
    search_term = $(this).val();
    $("#" + active_menu + "_dishes").html("");
    loadStarters(search_term, active_menu);

});




function changeTabs(evt, tab_id) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab_id).style.display = "flex";
    evt.currentTarget.className += " active";

    active_menu = tab_id;

    $("#searchbar").val("");
    start = -10;
    limit = 10;
    total = 10;
    started = false;
    is_loading = false;
    loadStarters("", active_menu);

}

/**
 * chef calculate bill
 */


// calculate all prices
function calculateChefBill(coupon_code = null) {
    var service_id = $("#service_id").val();
    var event_childrens = $("#event_childrens").val();
    var event_adults = $("#event_adults").val();

    var event_addon_cleaner = $("#event_addon_cleaner").val();
    var event_addon_bartender = $("#event_addon_bartender").val();
    var event_addon_waiter = $("#event_addon_waiter").val();


    var form_data = {
        service_id: service_id,
        event_childrens: event_childrens,
        event_adults: event_adults,
        event_addon_cleaner: event_addon_cleaner,
        event_addon_bartender: event_addon_bartender,
        event_addon_waiter: event_addon_waiter,
        coupon_code: coupon_code
    };
    $.ajax({
        url: "ajax_calls/bookings/calculateChefBill",
        type: "post",
        data: form_data,
        dataType: "json",
        success: function (resp) {
            console.log(resp);
            if (resp.success) {
                // $("#b_guest_charges").val(resp.b_guest_charges);
                // $("#b_per_worker_charges").val(resp.b_per_worker_charges);
                // $("#b_gst_tax").val(resp.b_gst_tax);
                // $("#b_addon_cleaner_guest_charges").val(resp.b_addon_cleaner_guest_charges);
                // $("#b_addon_cleaner_per_worker_charges").val(resp.b_addon_cleaner_per_worker_charges);
                // $("#b_addon_bartender_guest_charges").val(resp.b_addon_bartender_guest_charges);
                // $("#b_addon_bartender_per_worker_charges").val(resp.b_addon_bartender_per_worker_charges);
                // $("#b_addon_all_charges").val(resp.b_addon_all_charges);
                // $("#b_adv_pay").val(resp.adv_pay);
                // $("#b_balance_pay").val(resp.balance_pay);
                // $("#b_total").val(resp.total_charges);

                // if("coupon_applied" in resp && resp.coupon_applied){
                //     // coupon animation
                //     $("#coupon1000").show();
                //     setTimeout(function(){
                //         $("#party1").hide();
                //         $("#party2").show();
                //         $("#coupon1000").hide();
                //     },2500);

                //     $("#b_discount").val(resp.coupon_discount);
                //     $(".f_b_discount").text(resp.coupon_discount);
                //     $(".f_coupon_code").text(coupon_code);

                //     if(resp.coupon_discount_type=="flat"){
                //         $(".f_coupon_discount_value").text(resp.coupon_discount_value);
                //     }else{
                //         $(".f_coupon_discount_value").text(resp.coupon_discount_value+"%");
                //     }
                // }else{
                //     $("#party2").hide();
                //     $("#party1").show();
                //     $("#b_discount").val(0);
                //     $(".f_b_discount").text(0);
                // }

                // // front looks
                // $(".f_adv_pay").text(resp.adv_pay);
                // $(".f_balance_pay").text(resp.balance_pay);
                // $(".f_total").text(resp.total_charges);

                // $(".f_worker_count").text(event_workers);
                // $(".f_worker_charges").text(resp.b_per_worker_charges);

                // $(".f_guest_count").text(event_adults);
                // $(".f_guest_charges").text(resp.b_guest_charges);

                // $(".f_addon_charges").text(resp.b_addon_all_charges);
                // $(".f_tax_amount").text(resp.b_gst_tax);

            }
        }
    });
}
