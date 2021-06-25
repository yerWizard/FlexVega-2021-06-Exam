
window.onload = function(){

 load_prices(); //Get initial coin data
 setInterval(load_prices, 30000); //Continue getting coin data every 30 seconds

}

function load_prices(){

    var reqBTC = new XMLHttpRequest();
    reqBTC.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        var bitcoinData = JSON.parse(this.responseText);
       var td = document.getElementById("btc").children;
       
       td[1].innerHTML = "€" + bitcoinData["result"]['XXBTZEUR']['a'][0];
       td[2].innerHTML = "€" + bitcoinData["result"]['XXBTZEUR']['b'][0];
      }
    };
    reqBTC.open("GET", "https://api.kraken.com/0/public/Ticker?pair=XBTEUR", true);
    reqBTC.send();

    var reqDOGE = new XMLHttpRequest();
    reqDOGE.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        var bitcoinData = JSON.parse(this.responseText);
       var td = document.getElementById("doge").children;
      
       td[1].innerHTML = "€" + bitcoinData["result"]['XDGEUR']['a'][0];
       td[2].innerHTML = "€" + bitcoinData["result"]['XDGEUR']['b'][0];
      }
    };
    reqDOGE.open("GET", "https://api.kraken.com/0/public/Ticker?pair=DOGEEUR", true);
    reqDOGE.send();

}