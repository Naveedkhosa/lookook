setupCounter('minusButton5', 'plusButton5', 'displayedNumber5');
setupCounter('minusButton6', 'plusButton6', 'displayedNumber6');


// waiter proceed
$(document).on("click", "#booking_proceed_step1", function () {
    var service_id = $("#service_id").val();
    if (service_id != "" && service_id > 0) {
        var event_date = $("#event_date").val();

        // check date is validated
        if (validEventDate(event_date)) {
            var event_time = $("#event_time").val();

            if (validEventTime(event_date, event_time)) {
                var adults = $("#event_adults").val();

                if (adults > 0) {
                    var workers = $("#event_workers").val();

                    if (workers > 0) {
                        // all are valid till now
                        var data = {
                            service_id: service_id,
                            event_date: event_date,
                            event_time: event_time,
                            event_adults: adults,
                            event_addon_cleaner: $("#event_addon_cleaner").val(),
                            event_addon_bartender: $("#event_addon_bartender").val(),
                            event_workers: workers,
                        };

                        // check for login
                        $.ajax({
                            url: "ajax_calls/login_status",
                            type: "post",
                            data: {
                                start: start
                            },
                            dataType: "json",
                            success: function (resp) {
                                if (resp.logged_in) {
                                    // logged in - yes proceed

                                    $("#proceed_btn_container").hide();
                                    $("#razor_pay_btn_container").show();
                                    var adv_pay = $("#b_adv_pay").val();
                                    $("#razorpay-btn").html(`Pay Now&nbsp;&#x20B9;<span class="f_adv_pay">${adv_pay}</span>`);
                                    openPopup('popupContainer4');
                                    updateSummary(data);

                                } else {
                                    openPopup("popupContainerLogin");
                                }

                            }
                        });



                    } else {
                        alert("Please select valid number of waiters");
                    }

                } else {
                    alert("Please select valid numbers of guests");
                }


            } else {
                alert("Please select a valid time slot");
                $("#event_time").val("null");
                $('#time_select').html("Select serving time");
                dateUpdates();
            }

        } else {
            alert("Please select a valid event date");
            $("#event_date").val("null");
            $('#date_select').html("Select date");
            dateUpdates();
        } // validate event date


    } else {
        window.location.href = "home";
    }
});

// create booking and pay now
$(document).on("click", "#razorpay-btn", function () {



});



// confirm no of waiters
$("#confirm_worker_others").on("click", function () {
    var workers = 1;
    workers = parseInt($("#displayedNumber6").attr("data-val"));
    if (workers > 0) {
        $("#event_workers").val(workers);
        calculateAll();
        if (workers > 1) {
            $("#number_of_workers").text(workers + " Waiters");
        } else {
            $("#number_of_workers").text(workers + " Waiter");
        }
        $("#modal5 .close").click();
    }
});

// booking summary
function updateSummary(data) {
    var date = new Date(data.event_date);
    $("#s_event_date").html(`${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`);
    $("#s_event_time").html($("#time_select").text());
    $("#s_event_adults").html($("#number_of_people").text());
    $("#s_event_workers").html($("#number_of_workers").text());
    $("#f_addon_cleaner_count").text(data.event_addon_cleaner);
    $("#f_addon_bartender_count").text(data.event_addon_bartender);

}



// on event_addon_cleaner - update charge
$("#plusButton12").on("click", function () {
    var displayElement = $("#displayedNumber12");
    var inputElement = $("#event_addon_cleaner");
    var val = parseInt(inputElement.val());
    var max = parseInt(displayElement.attr("data-max"));
    if (val < max) {
        val++;
    }
    displayElement.text(val);
    inputElement.val(val);
    calculateAll();
});

$("#minusButton12").on("click", function () {
    var displayElement = $("#displayedNumber12");
    var inputElement = $("#event_addon_cleaner");
    var val = parseInt(inputElement.val());
    var min = parseInt(displayElement.attr("data-min"));
    if (val > min) {
        val--;
    }
    displayElement.text(val);
    inputElement.val(val);
    calculateAll();
});

// on event_addon_bartender - update charge
$("#plusButton13").on("click", function () {
    var displayElement = $("#displayedNumber13");
    var inputElement = $("#event_addon_bartender");
    var val = parseInt(inputElement.val());
    var max = parseInt(displayElement.attr("data-max"));
    if (val < max) {
        val++;
    }
    displayElement.text(val);
    inputElement.val(val);
    calculateAll();
});

$("#minusButton13").on("click", function () {
    var displayElement = $("#displayedNumber13");
    var inputElement = $("#event_addon_bartender");
    var val = parseInt(inputElement.val());
    var min = parseInt(displayElement.attr("data-min"));
    if (val > min) {
        val--;
    }
    displayElement.text(val);
    inputElement.val(val);
    calculateAll();
});


/**
 * 
 * Coupan handling
 * 
 */
// select coupan
$("#open_coupan_popups").on("click", function () {

});
// apply coupan
$(document).on("click", ".apply_coupan", function () {
    $("#modal6 .close").click();
    coupon_code = $(this).attr("data-coupon_code");
    calculateAll(coupon_code);
});
// remove coupan
$(document).on("click", "#removeCoupan", function () {
    $("#party2").hide();
    $("#party1").show();
    calculateAll();
});

var start = -3;
var limit = 3;
var total = 3;
var started = false;
// load coupans
$(document).ready(function () {
    function loadCoupons() {
        if (total > start) {
            start = start + limit;

            $.ajax({
                url: "ajax_calls/bookings/loadCoupans",
                type: "post",
                data: {
                    start: start
                },
                dataType: "json",
                success: function (resp) {
                    console.log(resp);
                    if (resp.success) {
                        if ("total" in resp) {
                            total = resp.total;
                            $("#coupans_container").html("");
                        }
                        
                        start = resp.start;
                        limit = resp.limit;
                        
                        resp.coupans.forEach(coupan => {
                            $("#coupans_container").append(`<div class="avail_copon">
                        <div class="space_ten summary_top_box">
                          <p class="solid_smal">${coupan.coupon_code}</p>
                          <p class="solid_smal malta curser apply_coupan" data-coupon_code="${coupan.coupon_code}">TAP TO APPLY</p>
                        </div>
                        <div class="space_ten summary_top_box">
                          <p class="para_gray">You will save&nbsp;<span class="solid_smal"> ${coupan.coupon_discount} ${coupan.coupon_type == 'flat' ? '' : '%'} </span></p>
                        </div>
                      </div>`);
                        });
                    } else {
                        if ("zero" in resp) {
                            $("#coupans_container").html(`<p class="para_gray">${resp.msg}</p>`);
                        }
                    }
                }
            });
        }
    }



    // load more coupans - lazy loading
    document.addEventListener('scroll', function (event) {
        if (event.target.id === 'coupans_container') {
            if (Math.ceil(document.getElementById("coupans_container").scrollTop + document.getElementById("coupans_container").offsetHeight) >= document.getElementById("coupans_container").scrollHeight) {
                loadCoupons();
            }
        }
    }, true);


    $("#explore_coupons").on("click", function () {
        if ($(this).attr("data-loaded") == "false") {
            $(this).attr("data-loaded", "true");
            loadCoupons();
        }
        openModal('modal6');
    });

});
