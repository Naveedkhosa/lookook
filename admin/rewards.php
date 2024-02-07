<?php
include "../config.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards | Look My Cook</title>

    <!-- css link -->


    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/rewards.css">
    <link rel="stylesheet" href="css/alert_box.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php include "dashboard_header.php"; ?>

    <!-- rewards - content -->
    <div class="_table_container_">
        <table class="_table_is" border="1">
            <thead>
                <tr>
                    <th>Option Name</th>
                    <th>value</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="Users_output">
                <?php
                // load user options
                $sql = "SELECT * FROM `user_options`;";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                            <td><?= $row['option_name'] ?></td>
                            <td><?= $row['option_value'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td>
                                <button class="edit_option" data-name="<?= $row['option_name'] ?>">Edit</button>
                            </td>
                        </tr>
                    <?php
                        }
                    } else { ?>
                        <tr>
                            <td>No option data was found.</td>
                        </tr>
                    <?php  } ?>
                <?php } else { ?>
                    <tr>
                        <td>Something went wrong, please report if error persists.</td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>



    <!-- alert box -->
    <div class="alert">
        <div class="_message_"></div>
        <span class="closebtn">&times;</span>
    </div>
    <!-- alert box -->


    <?php include "dashboard_footer.php"; ?>

    <script>
        // update tax

        $(document).ready(function() {

            // close | hide alert
            $(".closebtn").on("click", function() {
                $(this).parent().css("opacity", "0");
                setTimeout(function() {
                        $(".alert").css("display", "none");
                    },
                    600);
            });


            var hide_alert_timeout;

            function hide_alert_auto() {
                $(".alert").css("opacity", "0");
                hide_alert_timeout = setTimeout(hide_alert(), 600);
            }

            function hide_alert() {
                $(".alert").css("display", "none");
            }



        });
    </script>
</body>

</html>