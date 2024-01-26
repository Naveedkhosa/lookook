</div>
</div>
</div>

<script src="../static/js/jquery.js"></script>
<script>
$(document).ready(function() {

     // show - hide sidebar
     $("#btn_for_sidebar").click(function(e) {
            e.preventDefault();
            $('._bottom_left').toggleClass("move_it");
        });
        // show - hide sidebar

    // show - hide sub menu
    $(".sub_menu").css("display", "flex");
    $(".sub_menu").hide();

    $("#sub_menu_trigger").click(function() {
        $(".sub_menu").toggle();
    });
    // show - hide sub menu

});
</script>