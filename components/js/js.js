
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
  modal.style.display = "flex";
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
