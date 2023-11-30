onload  = start;

function start(){	
var i = 1;
function Move(){ 	
	i = (i%4)+1; // 4 is the Number of image in slider
	document.getElementById('i'+i).checked = true;
}
setInterval(Move,3000); //change img in 3 sec
}

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
 // this is side bar script
 document.getElementById("right_sidebr").addEventListener("click", function () {
    var roverlay = document.querySelector(".roverlay");
    roverlay.style.display = 'flex';

    // Trigger a reflow to restart the transition
    void roverlay.offsetWidth;

    roverlay.style.opacity = '1';
  });

  document.querySelector(".roverlay").addEventListener("click", function (e) {
    if (e.target == e.currentTarget) {
      var roverlay = document.querySelector(".roverlay");
      roverlay.style.opacity = '0';

      setTimeout(function () {
        roverlay.style.display = 'none';
      }, 500); // Adjust the delay to match the transition duration
    } else {
      // Add any other actions you want to perform when clicking inside the sidebar
    }
  });
