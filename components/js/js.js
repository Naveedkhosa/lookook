
function openModal(modal)
{
  var modal = document.getElementById(modal);
    modal.style.display = "block";
    var span = document.querySelector("#"+modal.id+" .close");
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}

function openModall(modalId) {
  var modal = document.getElementById(modalId);

  // Toggle the 'active' class
  modal.classList.toggle('active');

  var span = document.querySelector("#" + modalId + " .close");
  span.onclick = function () {
    // Toggle the 'active' class when the close button is clicked
    modal.classList.toggle('active');
  }

  window.onclick = function (event) {
    // Toggle the 'active' class when clicking outside the modal
    if (event.target == modal) {
      modal.classList.toggle('active');
    }
  }
}

function openPopup(modId) {
  var modal = document.getElementById(modId);
  modal.style.display = "block";
}

function closePopup(modId) {
  var modal = document.getElementById(modId);
  modal.style.display = "none";
}

function confirmAction(modId) {
  // Add your confirm action logic here
  alert("Confirmed for " + modId + "!");
  closePopup(modId); // Close the popup after confirming
}


// pop up 120 js start
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
// document.getElementById("defaultOpen").click();
// pop up 120 js end 


// searchbar JavaScript code

function search_animal() {
  let input = document.getElementById('searchbar').value
  input = input.toLowerCase();
  let x = document.getElementsByClassName('tab_card');
  
  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
    x[i].style.display = "none";
    }
    else {
    x[i].style.display = "list-item";
    }
  }
  }


// coupon popup js start

function openCoupon(coupon, sectionToShow) {
  // Get the coupon element by its ID
  var couponElement = document.getElementById(coupon);

  // Display the coupon
  couponElement.style.display = "block";

  // Get the close button inside the coupon
  // var span = document.querySelector("#" + couponElement.id + " .close");

  // Define a function to close the coupon after 5 seconds
  setTimeout(function() {
    couponElement.style.display = "none";
  }, 2000);

  // Show or hide the relevant section based on the parameter
  var sections = document.getElementById("party1");
  for (var i = 0; i < sections.length; i++) {
    sections[i].style.display = "block";
  }

  var sectionToShowElement = document.getElementsByTagName("." + sectionToShow);
  sectionToShowElement.style.display = "none";
}

// Function to handle "TAP TO APPLY" click
function handleTapToApply() {
  openCoupon('coupon1000', 'party2');  // Open the second party section and associated coupon
}

// Function to handle "Remove" click
function handleRemove() {
  // Show only the first party section
  var sections = document.getElementById(party1);
  for (var i = 0; i < sections.length; i++) {
    sections[i].style.display = "block";
  }

  var firstPartySection = document.getElementById(party2);
  firstPartySection.style.display = "none";
}

// Attach the click events
var tapToApplyButton = document.querySelector(".solid_smal");
var removeButton = document.querySelector(".solid_smal");

tapToApplyButton.addEventListener("click", handleTapToApply);
removeButton.addEventListener("click", handleRemove);

// coupon popup js end




