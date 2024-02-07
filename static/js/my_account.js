alertify.set('notifier', 'position', 'top-right');
$(document).ready(function () {


    const last_name_ele = $("#last_name");
    const first_name_ele = $("#first_name");



    function validateName(name) {
        const regex = /^[a-zA-Z]*$/;
        if (regex.test(name) && name.length >= 2 && name.length < 60) {
            return true;
        } else {
            return false;
        }
    }

    first_name_ele.on("input", function () {
        if (validateName($(this).val())) {
            first_name_ele.parent().css("border", "1px solid #d1d1d1");
        } else {
            first_name_ele.parent().css("border", "1px solid red");
        }
    });

    last_name_ele.on("input", function () {
        if (validateName($(this).val())) {
            last_name_ele.parent().css("border", "1px solid #d1d1d1");
        } else {
            last_name_ele.parent().css("border", "1px solid red");
        }
    });

    $(document).on("click", "#update_names", function () {


        var first_name = first_name_ele.val();
        var last_name = last_name_ele.val();

        if (validateName(first_name)) {
            first_name_ele.parent().css("border", "1px solid #d1d1d1");
            first_name_ele.blur();
            if (validateName(last_name)) {
                last_name_ele.parent().css("border", "1px solid #d1d1d1");
                last_name_ele.blur();

                // ajax request to update names
                $.ajax({
                    url: "ajax_calls/my_account",
                    type: "post",
                    data: {
                        type: "update_names",
                        first_name: first_name,
                        last_name: last_name,
                    },
                    dataType: "json",
                    beforeSend: function () {
                        $(this).html("Updating...");
                        $(this).attr("disabled", "disabled");
                    },
                    success: function (resp) {
                        console.log(resp);
                        $(this).html("Update");
                        $(this).removeAttr("disabled");

                        if (resp.success) {
                            alertify.success(resp.msg);
                            $("#my_fullname").html(first_name + " " + last_name);
                            $("#wallet_address_name").html(first_name + " " + last_name);
                            $("#modal17 .close").click();
                        } else {
                            alertify.error(resp.msg);
                            if ("login" in resp) {

                                // redirect to login within 3 seconds
                                setTimeout(() => {
                                    if (!resp.login) {
                                        window.location.href = "login?location=account";
                                    }
                                }, 3000);

                            }

                            if ("first_name" in resp) {
                                first_name_ele.val(resp.first_name);
                            }

                            if ("last_name" in resp) {
                                last_name_ele.val(resp.last_name);
                            }


                        }
                    },
                    error: function () {
                        alertify.error("Something went wrong. Please try again later.");
                        $(this).html("Update");
                        $(this).removeAttr("disabled");
                    }
                });
                // ajax request to update names


            } else {
                last_name_ele.parent().css("border", "1px solid red");
                last_name_ele.focus();
            }
        } else {
            first_name_ele.parent().css("border", "1px solid red");
            first_name_ele.focus();
        }
    });

    // update address
    const update_user_address_ele = $("#update_user_address");
    const user_address_ele = $("#user_address");
    const user_address_content_ele = $("#user_address_content");

    function validateAddress(address) {
        if (address.length > 5) {
            return true;
        } else {
            return false;
        }
    }

    user_address_ele.on("input", function () {
        if (validateAddress($(this).val())) {
            $(this).parent().css("border", "1px solid #d1d1d1");
        } else {
            $(this).parent().css("border", "1px solid red");

        }
    });
    
    update_user_address_ele.on("click", function () {
        
        var user_address = user_address_ele.val();
        if (!validateAddress(user_address)) {
            user_address_ele.parent().css("border", "1px solid red");
            user_address_ele.focus();
        } else {
            user_address_ele.parent().css("border", "1px solid #d1d1d1");
            user_address_ele.blur();
            // ajax request to update address
            $.ajax({
                url: "ajax_calls/my_account",
                type: "post",
                data: {
                    type: "update_address",
                    address: user_address,
                    
                },
                dataType: "json",
                beforeSend: function () {
                    $(this).html("Updating...");
                    $(this).attr("disabled", "disabled");
                },
                success: function (resp) {
                    console.log(resp);
                    $(this).html("Update");
                    $(this).removeAttr("disabled");
                    
                    if (resp.success) {
                        alertify.success(resp.msg);
                        user_address_content_ele.html(user_address);
                        $("#modal19 .close").click();
                    } else {
                        alertify.error(resp.msg);
                        if ("login" in resp) {
                            
                            // redirect to login within 3 seconds
                            setTimeout(() => {
                                if (!resp.login) {
                                    window.location.href = "login?location=account";
                                }
                            }, 3000);
                            
                        }
                        
                        if ("address" in resp) {
                            user_address_content_ele.html(resp.address);
                        }
                        
                    }
                },
                error: function () {
                    alertify.error("Something went wrong. Please try again later.");
                    $(this).html("Update");
                    $(this).removeAttr("disabled");
                }
            });
            // ajax request to update address
            
            
        }
        
    });
    
    
    // update mobile number
    const my_mobile_number_content_ele = $("#my_mobile_number_content");
    const mobile_number_ele = $("#mobile_number");
    const update_phone_number_btn = $("#update_phone_number");
    
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
    
    mobile_number_ele.on("input", function () {
        if (numberValidation($(this).val())) {
            $(this).parent().css("border", "1px solid #d1d1d1");
        } else {
            $(this).parent().css("border", "1px solid red");

        }
    });
    
    
     
    update_phone_number_btn.on("click", function () {
        
        var mobile_number = mobile_number_ele.val();
        if (!numberValidation(mobile_number)) {
            mobile_number_ele.parent().css("border", "1px solid red");
            mobile_number_ele.focus();
        } else {
            mobile_number_ele.parent().css("border", "1px solid #d1d1d1");
            mobile_number_ele.blur();
            // ajax request to update address
            $.ajax({
                url: "ajax_calls/my_account",
                type: "post",
                data: {
                    type: "update_mobile",
                    mobile_number: mobile_number,
                    
                },
                dataType: "json",
                beforeSend: function () {
                    $(this).html("Updating...");
                    $(this).attr("disabled", "disabled");
                },
                success: function (resp) {
                    console.log(resp);
                    $(this).html("Update");
                    $(this).removeAttr("disabled");
                    
                    if (resp.success) {
                        alertify.success(resp.msg);
                        my_mobile_number_content_ele.html(mobile_number);
                        $("#modal18 .close").click();
                    } else {
                        alertify.error(resp.msg);
                        if ("login" in resp) {
                            
                            // redirect to login within 3 seconds
                            setTimeout(() => {
                                if (!resp.login) {
                                    window.location.href = "login?location=account";
                                }
                            }, 3000);
                            
                        }
                        
                        if ("mobile_number" in resp) {
                            my_mobile_number_content_ele.html(resp.mobile_number);
                        }
                        
                    }
                },
                error: function () {
                    alertify.error("Something went wrong. Please try again later.");
                    $(this).html("Update");
                    $(this).removeAttr("disabled");
                }
            });
            // ajax request to update address
            
            
        }
        
    });
    





});