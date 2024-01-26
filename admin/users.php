<?php 
include "../config.php"; 

$total_users = 0;
$users_query = "SELECT * FROM `users`;";
if($users_query_result = mysqli_query($conn,$users_query)){
if(mysqli_num_rows($users_query_result) > 0){
    $total_users = mysqli_num_rows($users_query_result);
}else{
    $total_users = 0;
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Look My Cook</title>

    <!-- css link -->

    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>

    <div class="_websites_stats_container _users_stats">

        <!--stat box -->
        <div class="_stat_box">
            <div class="_stat_box_top">
                <div class="stat_box_top_left">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="stat_box_top_right">
                    <div class="_stat_count"><?php echo $total_users; ?></div>
                    <div class="_stat_count_name">Total Users</div>
                </div>
            </div>
        </div>
        <!-- stat box end -->






    </div>


    <div class="user_search_container">
        <input type="search" name="search" placeholder="Search here" id="search_user">
        <a class='_user_edit_btn_csv' href="export-user-all.php?u=LK">Export CSV</a>
    </div>
    <div class="_table_container_">
        <table class="_table_is" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Alternative Numbers</th>
                    <th>Joining Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="Users_output">

            </tbody>
        </table>

    </div>

    <!-- CONTENT -->
    <?php include "dashboard_footer.php"; ?>


    <script>
   function loadUsers(search_term){
    $.ajax({
        url: "users_backend/load_users",
        type: "post",
        data: {
            search_term:search_term
        },
        success: function(user_data) {
          $("#Users_output").html(user_data);
        }

    });
   }

   loadUsers("*");

   $("#search_user").on("keyup",function() {
     loadUsers($(this).val());
   });
    </script>
</body>

</html>