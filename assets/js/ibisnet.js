var serverInfo;

function convertUptime(uptime) {
    var unit;
    uptime /= 1000; //convert to seconds
    if (uptime < 120) {
        unit = "seconds";
    } else if (uptime < 7200) {
        uptime /= 60;
        unit = "minutes";
    } else {
        uptime /= 60;
        unit = "hours";
    }

    var newUptime = Math.floor(uptime);
    var result = [newUptime, unit];
    return result;
}

var checkXmlHttp = new XMLHttpRequest();
checkXmlHttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        serverInfo = JSON.parse(this.responseText);

        var getDocumentXmlHttp = new XMLHttpRequest();

        if (serverInfo.online === true) {
            getDocumentXmlHttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("server-status").innerHTML = this.responseText;

                    document.getElementById("current-players").innerHTML = serverInfo.player_count;
                    var trueVesselCount = Number(serverInfo.vessels) - 30;
                    document.getElementById("active-vessels").innerHTML = trueVesselCount.toString();

                    var uptime = convertUptime(serverInfo.uptime);
                    document.getElementById("uptime").innerHTML = uptime[0];
                    document.getElementById("uptime-unit").innerHTML = " " + uptime[1];
                }
            }

            getDocumentXmlHttp.open("GET", "elements/status.html", true);
            getDocumentXmlHttp.send();
        } else {
            getDocumentXmlHttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("server-status").innerHTML = this.responseText;
                }
            }
            getDocumentXmlHttp.open("GET", "elements/offline.html", true);
            getDocumentXmlHttp.send();
        }
    }
};

checkXmlHttp.open("GET", "FetchServerInfo.php", true);
checkXmlHttp.send();

