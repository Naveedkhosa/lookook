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
                            event_addon_cleaner: $("#event_addon_cleaner").val(),
                            event_addon_bartender: $("#event_addon_bartender").val(),
                            workers: workers,
                        };

                        openPopup('popupContainer4');
                        updateSummary(data);

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
$("#open_coupan_popups").on("click",function(){

});
// apply coupan
$("#apply_coupan").on("click",function() {
    coupon_code = $(this).attr("data-coupan");
    $("#coupon1000").show();
    setTimeout(function(){
        $("#party1").hide();
        $("#party2").show();
        $("#coupon1000").hide();
    },2000);
});
// remove coupan
$("#removeCoupan").on("click",function(){
    $("#party2").hide();
    $("#party1").show();
});
