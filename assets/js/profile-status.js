var serverInfo;
var playerStatusElement = document.getElementById("user-status");

if (playerStatusElement != null)
{
    var checkXmlHttp = new XMLHttpRequest();
    checkXmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            serverInfo = JSON.parse(this.responseText);

            var getDocumentXmlHttp = new XMLHttpRequest();

            var playerName = document.getElementById("user-name").innerHTML;

            if (serverInfo.online === true && $.inArray(playerName, serverInfo.players) !== -1) {
                playerStatusElement.setAttribute("class", "label label-success");
                playerStatusElement.innerHTML = "Online";
            }
            playerStatusElement.setAttribute("style", "display: inline");
        }
    };

    checkXmlHttp.open("GET", "FetchServerInfo.php", true);
    checkXmlHttp.send();
}



