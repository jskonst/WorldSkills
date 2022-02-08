document.addEventListener('scroll', function(e){
    const header = document.getElementById("header");
    if(window.scrollY > 0){
    header.style.boxShadow = '0 3px 7px #555'
}  else{
  header.style.boxShadow = '0 0px 0px #555'
}
});

window.onload = function(){
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}}