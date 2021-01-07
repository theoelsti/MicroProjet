let openedTime = false
function showTime() {
    if (!openedTime) {
            document.getElementsByClassName("openbuttons")[0].style.opacity = 1;
            document.getElementsByClassName("opentime")[0].style.opacity = 0.5;
    }
    else {
            document.getElementsByClassName("openbuttons")[0].style.opacity = 0;
            document.getElementsByClassName("opentime")[0].style.opacity =1;
    }
    openedTime = !openedTime
}
