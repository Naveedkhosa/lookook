/**
 * number validation
 */

function numberValidation(n) {
    if (isNaN(n) || n == "") {
        return false;
    } else if (n != "" && (n.length < 10 || n.length > 10)) {
        return false;
    } else {
        return true;
    }
}

// on number pasting
$("#contacts").on("paste", function () {
    if (numberValidation($(this).val())) {
        $(this).css("border", "1px solid #c5c5c5");
        $(this).attr("readonly", "true");
        $("#_otp_btn_again").attr("disabled", "disabled");
        // send Otp
        sendOtp($(this).val());
    } else {
        $(this).css("border", "1px solid red");
    }
});

// global variables
var seconds = null;
var interval = null;

alertify.set('notifier', 'position', 'bottom-right');

// on contact input
$("#contacts").on("input", function () {
    if (numberValidation($(this).val())) {
        $(this).css("border", "1px solid #c5c5c5");
        $(this).attr("readonly", "true");
        $("#_otp_btn_again").attr("disabled", "disabled");
        // send Otp
        sendOtp($(this).val());
    } else {
        $(this).css("border", "1px solid red");
    }
});

$("#change_num").on("click", function () {
    clearInterval(interval);
    $("#contacts").removeAttr("readonly");
    $("#contacts").focus();
    $("#_timer").html(0);
    $("#_otp_btn_again").removeAttr("disabled");
});


function updateTime() {
    $("#_timer").html(seconds);
    if (seconds == 0) {
        $("#_otp_btn_again").removeAttr("disabled");
        clearIntervalNow();
    }
    seconds--;
}

function clearIntervalNow() {
    clearInterval(interval);
}

// resend OTP - handling
$("#_otp_btn_again").on("click", function () {
    var contact_ag = $("#contacts").val();
    if (numberValidation(contact_ag)) {
        $(this).css("border", "1px solid #c5c5c5");
        $("#contacts").attr("readonly", "true");
        $("#_otp_btn_again").attr("disabled", "disabled");
        // send Otp
        sendOtp(contact_ag);
    } else {
        $(this).css("border", "1px solid red");
    }
});

// sendOtp function
function sendOtp(contact) {
    $("#responseMsg").html("");
    seconds = null;
    clearInterval(interval);

    $.ajax({
        url: "ajax_calls/sendOTP",
        type: "post",
        data: {
            cn: contact
        },
        dataType: "json",
        success: function (resp) {
            console.log(resp);
            if (resp.success) {
                seconds = resp.timer;
                $("#responseMsg").html("OTP Sent Successfully.");
                $("#_otp_btn_again").css("visibility", "visible");
                interval = setInterval(updateTime, 1000);
            } else {
                $("#_otp_btn_again").removeAttr("disabled");
                $("#contacts").removeAttr("readonly");
                alertify.error(resp.msg);
            }
        },
        error: function () {
            alertify.error("Something went wrong. Please try again later.");
        }
    });

}



// proceed login/signup
$("#_proceed_btn").on("click", function () {
    var contact_number = $("#contacts").val();
    var agree = $("#agree");
    var otp = $("#otp").val();
    if (contact_number == "" || otp == "" || !agree.prop("checked")) {
        alertify.error("Please fill all fields");
    } else {
        $.ajax({
            url: "ajax_calls/login",
            type: "post",
            data: {
                contact: contact_number,
                otp:otp
            },
            dataType: "json",
            beforeSend:function() {
                $(this).attr("disabled","disabled");
                $(this).html("authenticating...");
            },
            success: function (resp) {
                $(this).html("proceed");
                $(this).removeAttr("disabled");
                console.log(resp);
                if (resp.success) {
                    alertify.success(resp.msg);
                    setTimeout(function(){
                        window.location.href=$("#location").val()??"home";
                    },3000)
                } else {
                    alertify.error(resp.msg);
                }
            },
            error: function () {
                alertify.error("Something went wrong. Please try again later.");
                $(this).html("proceed");
                $(this).removeAttr("disabled");
            }
        });
    }
});











