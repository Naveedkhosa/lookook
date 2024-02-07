<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Help & Support | Look My Cook</title>
    <link rel="stylesheet" href="components/css/style.css" />
    <link rel="stylesheet" href="components/css/style_pop_up.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
</head>
<body>
    <button class="back-button" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
            d="M244 400L100 256l144-144M120 256h292" />
        </svg>
        Help & Support
      </button>
    <!-- support help with contact start.  -->
    <div class="support_help_section">
      <div class="support_help_in_section">

        <div class="support_help_contact_cards">
          <a class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="ph:phone-call-light"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">Call</p>
                <p class="para_p space_top">(+91) 8542854205</p>
            </div>
        </a>
          <a class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="logos:whatsapp-icon"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">Whatsapp</p>
                <p class="para_p space_top">(+91) 8542854205</p>
            </div>
        </a>
          <a class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="fluent:mail-16-regular"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">E-Mail</p>
                <p class="para_p space_top">support@lookmycook.com</p>
            </div>
        </a>
          <a href="FAQs" class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="ph:question"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">FAQs</p>
                <p class="para_p space_top">For quick questions & answers</p>
            </div>
        </a>
        </div>

      </div>
    </div>
    <!-- support help with contact end.  -->

    
  <!-- bottom nav include -->
  <?php include "inc/bottom_nav.php"; ?>
  


      
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="components/js/js.js"></script>

</body>
</html>
