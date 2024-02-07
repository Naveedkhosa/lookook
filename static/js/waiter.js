setupCounter('minusButton5', 'plusButton5', 'displayedNumber5');
setupCounter('minusButton6', 'plusButton6', 'displayedNumber6');

// setupCounter('minusButton12', 'plusButton12', 'displayedNumber12','event_addon_cleaner');
// setupCounter('minusButton13', 'plusButton13', 'displayedNumber13','event_addon_bartender');

// updateOpacityValues(val,"plusButton12","minusButton12",displayElement);
// function updateOpacityValues(val,plusBtn,minusBtn,display){

// }
// proceed waiter booking


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

        getPerWorkerCharge(workers, $("#service_id").val());
        updateAddonCharges($("#event_addon_cleaner").val(), 3);
        updateAddonCharges($("#event_addon_bartender").val(), 2);

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
    console.log(data);
}

function getPerWorkerCharge(workers, service_id) {
    // ajax
    $.ajax({
        url: "ajax_calls/bookings/worker_charge",
        type: "post",
        data: {
            workers: workers,
            service_id: service_id,
        },
        dataType: "json",
        beforeSend: function () {
            $("#loading_modal").show();
        },
        success: function (resp) {
            $("#loading_modal").hide();
            if (resp.success) {
                $("#b_per_worker_charges").val(resp.charge);
                $(".f_worker_count").text(workers);
                $(".f_worker_charges").text(resp.charge);
                calculateAll();
            } else {
                console.log(resp.msg);
            }
        }
    });
    // ajax
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
    updateAddonCharges(val, 3);
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
    updateAddonCharges(val, 3);
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
    updateAddonCharges(val, 2);
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
    updateAddonCharges(val, 2);
});



function updateAddonCharges(addon_numbers, service_id) {
    var guests = $("#event_adults").val();
    // ajax
    $.ajax({
        url: "ajax_calls/bookings/addon_service_charge",
        type: "post",
        data: {
            guests: guests,
            service_id: service_id,
            workers: addon_numbers
        },
        dataType: "json",
        success: function (resp) {
            if (resp.success) {
                if (service_id == 2) {
                    $("#b_addon_bartender_guest_charges").val(resp.charge);
                    $("#b_addon_bartender_per_worker_charges").val(resp.addon_per_worker_fee);
                } else if (service_id == 3) {
                    $("#b_addon_cleaner_guest_charges").val(resp.charge);
                    $("#b_addon_cleaner_per_worker_charges").val(resp.addon_per_worker_fee);
                }
                calculateAllAddon();
                calculateAll();
            } else {
                console.log(resp.msg);
            }
        }
    });
    // ajax

}

function calculateAllAddon() {
    var b_addon_cleaner_guest_charges = parseInt($("#b_addon_cleaner_guest_charges").val());
    var b_addon_bartender_guest_charges = parseInt($("#b_addon_bartender_guest_charges").val());
    var b_addon_cleaner_per_worker_charges = parseInt($("#b_addon_cleaner_per_worker_charges").val());
    var b_addon_bartender_per_worker_charges = parseInt($("#b_addon_bartender_per_worker_charges").val());
    var b_addon_all_charges = b_addon_cleaner_guest_charges + b_addon_bartender_guest_charges + b_addon_cleaner_per_worker_charges + b_addon_bartender_per_worker_charges;
    $("#b_addon_all_charges").val(b_addon_all_charges);
    $(".f_addon_charges").text(b_addon_all_charges);
}