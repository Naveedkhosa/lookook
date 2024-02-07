<!-- nav_popped_up -->
<div id="nav_popped_up">
  <ul>
    <?php
    /**
     * if user is logged in then show
     */
    if (isset($_SESSION['logged_user_id'])) { ?>
      <li>
        <a href="account">
          <div class="a_left">
            <iconify-icon icon="solar:user-bold-duotone"></iconify-icon> My
            Account
          </div>
          <i class="fa fa-chevron-right"></i>
        </a>
      </li>
      <li>
        <a href="bookings">
          <div class="a_left">
            <iconify-icon icon="tabler:brand-booking"></iconify-icon> My
            Bookings
          </div>
          <i class="fa fa-chevron-right"></i>
        </a>
      </li>
    <?php
      /**
       * if user is not logged in
       */
    } else { ?>

      <li>
        <a href="login">
          <div class="a_left">
            <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
            Signup / Login
          </div>
          <i class="fa fa-chevron-right"></i>
        </a>
      </li>

    <?php } ?>



    <li>
      <a href="FAQs">
        <div class="a_left">
          <iconify-icon icon="solar:file-text-bold-duotone"></iconify-icon>
          Frequently Asked Question FAQs
        </div>
        <i class="fa fa-chevron-right"></i>
      </a>
    </li>
    <li>
      <a href="#">
        <div class="a_left">
          <iconify-icon icon="fluent:person-support-16-filled"></iconify-icon>
          Refund & Cancellation Policy
        </div>
        <i class="fa fa-chevron-right"></i>
      </a>
    </li>
    <?php
    /**
     * if user is logged in then show
     */
    if (isset($_SESSION['logged_user_id'])) { ?>
      <li>
        <a href="refer-and-earn">
          <div class="a_left">
            <iconify-icon icon="heroicons-solid:speakerphone"></iconify-icon>
            Refer and Earn
          </div>
          <i class="fa fa-chevron-right"></i>
        </a>
      </li>
    <?php } ?>

    <li>
      <a href="help-and-support">
        <div class="a_left">
          <iconify-icon icon="fluent:person-support-16-filled"></iconify-icon>
          Help & Support
        </div>
        <i class="fa fa-chevron-right"></i>
      </a>
    </li>

    <?php
    /**
     * if user is logged in then show
     */
    if (isset($_SESSION['logged_user_id'])) { ?>
      <li>
        <a href="logout">
          <div class="a_left">
          <iconify-icon icon="quill:off"></iconify-icon>
           Logout
          </div>
          <i class="fa fa-chevron-right"></i>
        </a>
      </li>
    <?php } ?>

  </ul>
</div>
<!-- nav_popped_up -->