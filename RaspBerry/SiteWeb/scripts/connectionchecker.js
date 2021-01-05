var lastState = 0  
function doesConnectionExist() {
    const ip = window.location.hostname;
    const port =  window.location.port;
    var xhr = new XMLHttpRequest();
    var file = `http://${ip}:${port}/nothing.txt`;
 
    xhr.open('HEAD', file , true);
    xhr.send();
    xhr.addEventListener("readystatechange", processRequest, false);
    function processRequest(e) {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 304) {
          
          if(lastState == 0){
            lastState = 1
            // document.getElementById("location").innerHTML = `Connecté à ${window.location.hostname} sur le port ${window.location.port}`;
            if(window.location.hostname == "localhost") msg = `<b>Connecté</b> au localhost `
            else `<b>Connecté</b> à ${window.location.hostname}`
            new ToasterBox({
              msg: msg,
              html: true,
              time: 5000,
              className: null,
              closeButton: false,
              maxWidth: 300,
              autoOpen: true,
              position: 'top-right', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
              backgroundColor: "#338204",
              closeIcon: null
              })
            
          } 
        }else{
          if(lastState){
            new ToasterBox({
              msg: `<b>Déconnecté</b> du serveur`,
              html: true,
              time: 5000,
              className: null,
              closeButton: false,
              maxWidth: 350,
              autoOpen: true,
              position: 'top-right', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
              backgroundColor: null,
              closeIcon: null
            })
            lastState = 0
          // document.getElementById("location").innerHTML = `Déconnecté du serveur`;
          // document.getElementById("location").style.color = "#b9112d";
        }
        }
      }
    }
}
doesConnectionExist()
setInterval(doesConnectionExist, 10000)
