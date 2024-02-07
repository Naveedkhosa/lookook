<?php
include 'config.php';
if (isset($_SESSION['logged_user_id'])) {

  $user_id = $_SESSION['logged_user_id'];


  $sql = "SELECT * FROM users WHERE user_id={$user_id}";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if ($user['refer_code'] == "" || $user['refer_code'] == null) {

        // add refer code for old users
        $refer_code = uniqid() . $user_id;

        $referCodeUpdate = "UPDATE users SET refer_code='{$refer_code}' WHERE user_id={$user_id}";

        if (mysqli_query($conn, $referCodeUpdate)) {
          $invite_link = SITE_URL . "login?refer=" . $refer_code;
        }
      } else {
        $invite_link = SITE_URL . "login?refer=" . $user['refer_code'];
      }
    } else {
      header("Location:login?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
  }

  /**
   * 
   * get all referals
   * 
   */
  function getReferrals()
  {
    global $conn, $user_id;
    $result_array['success'] = false;
    $result_array['total'] = 0;
    $result_array['referrals'] = NULL;

    $query = "SELECT user_id,user_original_number,reward_given_to_referred_by,date_format(joined_on,'%d %M %Y %h:%i:%s %p (%W)') as joined_on FROM users WHERE referred_by = {$user_id}";
    if ($query_result = mysqli_query($conn, $query)) {
      if (mysqli_num_rows($query_result) > 0) {
        $result_array['success'] = true;
        $result_array['total'] = mysqli_num_rows($query_result);
        $result_array['referrals'] = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
        return $result_array;
      } else {
        return $result_array;
      }
    } else {
      return $result_array;
    }
  }
  $referrals = getReferrals();
  
} else {
  header("Location:login");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Refer and Earn | Look My Cook</title>
  <link rel="stylesheet" href="components/css/style.css" />
  <link rel="stylesheet" href="components/css/style_pop_up.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  <button class="back-button" onclick="history.back()">
    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
    </svg>
    Refer and Earn
  </button>

  <div class="hero_how_sec">
    <div class="ref_and_img_top">
      <img src="components/imag/g_img/WhatsApp Image 2024-01-11 at 02.02.33_b9109300.jpg" alt="" loading="lazy" />
    </div>

    <div class="earn_note">
      <iconify-icon icon="fxemoji:loudspeaker"></iconify-icon>
      <p class="para_p_active">Refer a friend earn cool and exciting reward on every referal. Refer more! earn more!</p>
    </div>
    <div class="serving_city_main_cards">

      <!-- card city -->
      <div class="refral_card_">
        <div class="city_img">
          <img src="components/imag/colaborative.22525326.svg" alt="">
        </div>
        <p>Invit friends</p>
      </div>
      <hr>
      <!-- card city -->
      <!-- card city -->
      <div class="refral_card_">
        <div class="city_img">
          <img src="components/imag/gift.png" alt="">
        </div>
        <p>They get a discount</p>
      </div>
      <hr>
      <!-- card city -->
      <!-- card city -->
      <div class="refral_card_">
        <div class="city_img">
          <img src="components/imag/voucher.png" alt="">
        </div>
        <p>You get the credit</p>
      </div>
      <!-- card city -->
    </div>
    <div class="copy_code">
      <input type="text" <?= ($user['refer_code'] == "") ? "disabled" : "readonly" ?> value="<?= ($user['refer_code'] == "") ? "Please contact us to add referral system for you" : $invite_link  ?>" id="myInput">
      <button onclick="myFunction()" <?= ($user['refer_code'] == "") ? "disabled" : "readonly" ?>>Copy</button>
    </div>
    <div class="share_social_code">
      <div class="card_contact_icnn">
        <iconify-icon icon="logos:facebook"></iconify-icon>
      </div>
      <div class="card_contact_icnn">
        <iconify-icon icon="devicon:twitter"></iconify-icon>
      </div>
      <div class="card_contact_icnn">
        <iconify-icon icon="logos:whatsapp-icon"></iconify-icon>
      </div>
      <div class="card_contact_icnn">
        <iconify-icon icon="skill-icons:instagram"></iconify-icon>
      </div>

      <div class="card_contact_icnn">
        <iconify-icon icon="skill-icons:linkedin"></iconify-icon>
      </div>
    </div>

    <?php if (!$referrals['success']) : ?>

      <!-- when zero refral  -->
      <div class="zero_refer">
        <iconify-icon icon="mdi:invite"></iconify-icon>
        <p class="heading_p">You have no referrals yet.</p>
      </div>

    <?php else : ?>
      <!-- when refral  -->
      <div class="have_refral_section">
        <p class="solid_smal space_ten">Total referals: <?=$referrals['total']??0 ?> </p>
        <table>
          <tr>
            <th># S.No</th>
            <th>phone number</th>
            <th>Earn</th>
            <th>joining date</th>
          </tr>
          <?php foreach ($referrals['referrals'] as $key => $referral): ?>
          <tr>
            <td><?= $key+1 ?></td>
            <td><?= $referral['user_original_number'] ?></td>
            <td><?= $referral['reward_given_to_referred_by'] ?></td>
            <td><?= $referral['joined_on'] ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

    <?php endif; ?>







  </div>



  <!-- bottom menu start ... -->
  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>



  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="components/js/js.js"></script>
  <script>
    function myFunction() {
      // Get the text field
      var copyText = document.getElementById("myInput");

      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices

      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);

      // Alert the copied text
      alert("Copied the text: " + copyText.value);
    }
  </script>
</body>

</html>