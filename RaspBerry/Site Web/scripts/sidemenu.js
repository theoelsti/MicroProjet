let opened = false
function openNav() {
    if(opened) closeNav()
    else{
      document.getElementById("mySidebar").style.width = "180px";
      opened = true
    }
   
  }
function closeNav() {
document.getElementById("mySidebar").style.width = "0";
opened = false
}
