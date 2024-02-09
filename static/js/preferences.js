/**
 * 
 * step incrementer + decrementer
 *  
**/

var time_difference_h = 6;
var min_booking_budget = 2000;
const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


function setupCounter(minusId, plusId, numberId, input_id = null) {
    const plus = document.getElementById(plusId);
    const minus = document.getElementById(minusId);
    let number_el = document.getElementById(numberId);

    plus.addEventListener('click', () => {
        let val = parseInt(number_el.innerText);
        var max = number_el.getAttribute("data-max");
        if (val < max) {
            val++;
            number_el.innerText = val;
            number_el.setAttribute("data-val", val);
            if (input_id != null)
                document.getElementById(input_id).value = val;
            updateOpacity();
        }
    });

    minus.addEventListener('click', () => {
        let val = parseInt(number_el.innerText);
        var min = number_el.getAttribute("data-min");
        if (val > min) {
            val--;
            number_el.innerText = val;
            number_el.setAttribute("data-val", val);
            if (input_id != null)
                document.getElementById(input_id).value = val;

            updateOpacity();
        }
    });

    function updateOpacity() {
        let val = parseInt(number_el.innerText);
        minus.style.opacity = val === 0 ? 0.5 : 1;
    }
    updateOpacity();
}



/**
 * Date select functionality
*/

function isSpecialEvent(day, month) {
    // Special events in this year
    const specialEvents = [
        {
            month: 1,
            day: 1,
            name: "Happy New Year"
        },
        // Add more events as needed

    ];
    const event = specialEvents.find(event => event.month === month && event.day === day);

    return event ? event.name : null;
}




function dateUpdates() {
    const number_of_days = 30;
    var today = new Date();
    var dates_html = "";

    for (let i = 0; i <= number_of_days; i++) {
        const date = new Date(new Date().setDate(today.getDate() + i));
        var formated_date = `${date.getUTCFullYear()}-${('00' + (date.getMonth() + 1)).slice(-2)}-${('00' + date.getDate()).slice(-2)}`;
        const week_day = date.toLocaleString('en-US', {
            weekday: 'short'
        });
        const day_of_month = date.getDate();
        const month_name = months[date.getMonth()];

        var specialEvent = isSpecialEvent(day_of_month, date.getMonth() + 1);
        if (specialEvent) {
            dates_html += `<a href="#" class="date-option" data-date="${formated_date}">${specialEvent}</a>`;
        } else {
            dates_html += `<a href="#" class="date-option" data-date="${formated_date}">${day_of_month} ${month_name} ,${week_day}</a>`;
        }
    }
    $("#dateContainer").html(dates_html);
}

// date loads
$("#select_date_event").on("click", function () {
    openModall('modal4');
    dateUpdates();
});

// select date
$(document).on("click", ".date-option", function (e) {
    e.preventDefault();
    $('#date_select').html($(this).text());
    $('#modal4').removeClass('active');
    var validated_date = $(this).attr("data-date");
    $("#event_date").val(validated_date);

    var event_time = $("#event_time").val();

    if (event_time != "null") {

        if (!validEventTime(validated_date, event_time)) {
            $("#event_time").val("null");
            $('#time_select').html("Select serving time");
        }
    }
});

// select time - 
$(document).on("click", ".time-option", function (e) {
    e.preventDefault();
    $('#time_select').html($(this).text());
    $('#modal3').removeClass('active');
    var validated_time = $(this).attr("data-time");
    $("#event_time").val(validated_time);
});

// timeslots loads
$("#select_event_time").on("click", function () {
    openModall('modal3');
    update_timeslots();
});

function update_timeslots() {
    validated_date = $("#event_date").val();
    if (validated_date != "null") {
        validated_date = new Date(validated_date);
        validated_date.setHours(0, 0, 0, 0);
    } else {
        validated_date = new Date();
        validated_date.setHours(0, 0, 0, 0);
    }
    current_date = new Date();
    current_date.setHours(0, 0, 0, 0);
    var time_slots = "";

    possible_slots = [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21];

    if (validated_date.getTime() > current_date.getTime()) {
        possible_slots.forEach(slot => {
            if (slot == 12) {
                time_slots += `<a href="" class="time-option" data-time="${slot}">${slot}:00 PM</a>`;
            } else if (slot > 12) {
                time_slots += `<a href="" class="time-option" data-time="${slot}">${slot - 12}:00 PM</a>`;
            } else {
                time_slots += `<a href="" class="time-option" data-time="${slot}">${slot == 9 ? "09" : slot}:00 AM</a>`;
            }
        });
    } else {
        // today date 
        var today = new Date();

        possible_slots.forEach(slot => {
            if ((slot - today.getHours()) >= time_difference_h) {
                if (slot == 12) {
                    time_slots += `<a href="" class="time-option" data-time="12">12:00 PM</a>`;
                } else if (slot > 12) {
                    time_slots += `<a href="" class="time-option" data-time="${slot}">${slot - 12}:00 PM</a>`;
                } else {
                    time_slots += `<a href="" class="time-option" data-time="${slot}">${slot == 9 ? "09" : slot}:00 AM</a>`;
                }
            }
        });

    }

    if (time_slots == "") {
        $("#timeContainer").html(`<p class="para_p" style="width:100%;display:flex;align-items:center;">
        <svg  width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M8 15c-3.86 0-7-3.14-7-7s3.14-7 7-7s7 3.14 7 7s-3.14 7-7 7M8 2C4.69 2 2 4.69 2 8s2.69 6 6 6s6-2.69 6-6s-2.69-6-6-6"/><path fill="currentColor" d="M10 10.5c-.09 0-.18-.02-.26-.07l-2.5-1.5A.495.495 0 0 1 7 8.5v-4c0-.28.22-.5.5-.5s.5.22.5.5v3.72l2.26 1.35a.502.502 0 0 1-.26.93"/></svg>&nbsp;No time slot is available.
        </p>`);
    } else {
        $("#timeContainer").html(time_slots);
    }
}


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
    }
});



/**
 * Guests Handling for other services
 * 
 */

$("#confirm_guests_others").on("click", function () {
    var adults = 1;
    adults = parseInt($("#displayedNumber5").attr("data-val"));
    if (adults > 0) {
        $("#event_adults").val(adults);
        var service_id = $("#service_id").val();
        calculateAll();

        if (adults > 1) {
            $("#number_of_people").text(adults + " Adults");
        } else {
            $("#number_of_people").text(adults + " Adult");
        }
        $("#modal2 .close").click();
    }
});



// calculate all prices
function calculateAll(coupon_code=null) {
    var service_id = $("#service_id").val();
    var event_adults = $("#event_adults").val();
    var event_addon_cleaner = $("#event_addon_cleaner").val();
    var event_addon_bartender = $("#event_addon_bartender").val();
    var event_workers = $("#event_workers").val();
    var form_data = {
        service_id:service_id,
        event_adults: event_adults,
        event_addon_cleaner: event_addon_cleaner,
        event_addon_bartender: event_addon_bartender,
        event_workers: event_workers,
        coupon_code:coupon_code
    };
    $.ajax({
        url: "ajax_calls/bookings/calculateCharges",
        type: "post",
        data: form_data,
        dataType: "json",
        success: function (resp) {
            console.log(resp);
            if (resp.success) {
                $("#b_guest_charges").val(resp.b_guest_charges);
                $("#b_per_worker_charges").val(resp.b_per_worker_charges);
                $("#b_gst_tax").val(resp.b_gst_tax);
                $("#b_addon_cleaner_guest_charges").val(resp.b_addon_cleaner_guest_charges);
                $("#b_addon_cleaner_per_worker_charges").val(resp.b_addon_cleaner_per_worker_charges);
                $("#b_addon_bartender_guest_charges").val(resp.b_addon_bartender_guest_charges);
                $("#b_addon_bartender_per_worker_charges").val(resp.b_addon_bartender_per_worker_charges);
                $("#b_addon_all_charges").val(resp.b_addon_all_charges);
                $("#b_adv_pay").val(resp.adv_pay);
                $("#b_balance_pay").val(resp.balance_pay);
                $("#b_total").val(resp.total_charges);
                
                if("coupon_applied" in resp && resp.coupon_applied){
                    // coupon animation
                    $("#coupon1000").show();
                    setTimeout(function(){
                        $("#party1").hide();
                        $("#party2").show();
                        $("#coupon1000").hide();
                    },2500);

                    $("#b_discount").val(resp.coupon_discount);
                    $(".f_b_discount").text(resp.coupon_discount);
                    $(".f_coupon_code").text(coupon_code);

                    if(resp.coupon_discount_type=="flat"){
                        $(".f_coupon_discount_value").text(resp.coupon_discount_value);
                    }else{
                        $(".f_coupon_discount_value").text(resp.coupon_discount_value+"%");
                    }
                }else{
                    $("#party2").hide();
                    $("#party1").show();
                    $("#b_discount").val(0);
                    $(".f_b_discount").text(0);
                }

                // front looks
                $(".f_adv_pay").text(resp.adv_pay);
                $(".f_balance_pay").text(resp.balance_pay);
                $(".f_total").text(resp.total_charges);

                $(".f_worker_count").text(event_workers);
                $(".f_worker_charges").text(resp.b_per_worker_charges);

                $(".f_guest_count").text(event_adults);
                $(".f_guest_charges").text(resp.b_guest_charges);
                
                $(".f_addon_charges").text(resp.b_addon_all_charges);
                $(".f_tax_amount").text(resp.b_gst_tax);
            }
        }
    });
}




/**
 * proceed  after filling details
*/

$(document).on("click", "#step1_proceed", function () {
    var service_id = $("#service_id").val();
    if (service_id != "" && service_id > 0) {
        var event_date = $("#event_date").val();

        // check date is validated
        if (validEventDate(event_date)) {
            var event_time = $("#event_time").val();

            if (validEventTime(event_date, event_time)) {
                var adults = $("#event_adults").val();
                var childrens = $("#event_childrens").val();

                if (adults > 0) {

                } else {
                    alert("Please select valid numbers of guests");
                }
                // summary container
                //  openPopup('popupContainer4')

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


// validations
function validEventDate(e_date) {
    var current_date = new Date();
    current_date.setHours(0, 0, 0, 0);
    current_date = current_date.getTime();
    var v_date = new Date(e_date).getTime();
    if (e_date != "" && e_date != "null" && v_date >= current_date) {
        return true;
    } else {
        return false;
    }
}


function validEventTime(e_date, e_time) {
    var current_date = new Date();
    current_date.setHours(0, 0, 0, 0);

    var event_date = new Date(e_date);
    event_date.setHours(0, 0, 0, 0);

    if (e_time == "null" || e_time == "") {
        return false;
    } else {
        if (event_date.getTime() > current_date.getTime()) {
            if (e_time >= 9 && e_time <= 21) {
                return true; // time is valid as it belong to next day
            } else {
                return false; // time is not in this range (9:00am to 9:00 pm)
            }
        } else {
            var current_datetime = new Date();
            if ((e_time - current_datetime.getHours()) >= time_difference_h) {
                return true;
            } else {
                return false;
            }
        }

    }

}