setupCounter('minusButton5', 'plusButton5', 'displayedNumber5');
setupCounter('minusButton6', 'plusButton6', 'displayedNumber6');
setupCounter('minusButton12', 'plusButton12', 'displayedNumber12','event_addon_cleaner');
setupCounter('minusButton13', 'plusButton13', 'displayedNumber13','event_addon_waiter');


// proceed bartender booking


// bartender proceed
$(document).on("click", "#booking_proceed_step1", function () {
    var service_id = $("#service_id").val();
    if (service_id != "" && service_id > 0) {
        var event_date = $("#event_date").val();

        // check date is validated
        if (validEventDate(event_date)) {
            var event_time = $("#event_time").val();

            if (validEventTime(event_date, event_time)) {
                var adults = $("#event_adults").val();
                
                if(adults > 0){
                    var workers = $("#event_workers").val();

                    if(workers > 0){

                    // all are valid till now
                    var data = {
                        service_id:service_id,
                        event_date:event_date,
                        event_time:event_time,
                        event_addon_cleaner:$("#event_addon_cleaner").val(),
                        event_addon_waiter:$("#event_addon_waiter").val(),
                        workers:workers,
                    };
                   
                    openPopup('popupContainer4');
                    updateSummary(data);

                }else{
                    alert("Please select valid number of bartenders");
                }

                }else{
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

// confirm no of Bartenders
$("#confirm_worker_others").on("click",function(){
    var workers = 1;
    workers = parseInt($("#displayedNumber6").attr("data-val"));
    if(workers > 0){
        $("#event_workers").val(workers);
        if(workers > 1){
            $("#number_of_workers").text(workers+" Bartenders");
        }else{
            $("#number_of_workers").text(workers+" Bartender");
        }
        $("#modal5 .close").click();
    }
}); 

// booking summary
function updateSummary(data){
    console.log(data);
}

