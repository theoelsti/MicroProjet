function doesConnectionExist() {
    const ip = window.location.hostname;
    const port =  window.location.port;
    var xhr = new XMLHttpRequest();
    var file = `http://${ip}:${port}/nothing.txt`;
    xhr.open('HEAD', file , true);
    xhr.send();
    console.log("Checking connexion...")
    xhr.addEventListener("readystatechange", processRequest, false);
    function processRequest(e) {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 304) {
          document.getElementById("location").innerHTML = `Connecté à ${window.location.hostname} sur le port ${window.location.port}`;
          document.getElementById("location").style.color = "#0cd463";
        } else {
          document.getElementById("location").innerHTML = `Déconnecté du serveur`;
          document.getElementById("location").style.color = "#b9112d";
        }
      }
    }
}
doesConnectionExist()
setInterval(doesConnectionExist, 10000)
