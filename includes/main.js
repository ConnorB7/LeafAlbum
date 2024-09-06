var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (currenScrollPos < 100px) {
    document.getElementById("navbar").style.top = "0";
  } 
  elseif (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } 
  else {
    document.getElementById("navbar").style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
}
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}