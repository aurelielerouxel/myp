// Get the lawyer
var lawyer = document.getElementById("lawyer");

// Get the button that opens the lawyer
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the lawyer
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the lawyer
btn.onclick = function() {
  lawyer.style.display = "block";
}

// When the user clicks on <span> (x), close the lawyer
span.onclick = function() {
  lawyer.style.display = "none";
}

// When the user clicks anywhere outside of the lawyer, close it
window.onclick = function(event) {
  if (event.target == lawyer) {
    lawyer.style.display = "none";
  }
}
