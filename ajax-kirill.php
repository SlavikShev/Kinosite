<!doctype html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible"
              content="ie=10">
        <title>Title</title>
    </head>
    <body>
        <button type="button"
                id="load">Load data
        </button>
        <div id="content"></div>
        <script>
            document.getElementById("load").onclick = function () {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        let contentDiv = document.getElementById("content");

                        contentDiv.innerHTML = "";
                        if (xhr.status == 200) {
                            let responseString = xhr.responseText;
                            let rates = JSON.parse(responseString);
                            
                            
                            let contentTable = document.createElement("table");
                            let headerTR = document.createElement("tr");
                            let thCcy = document.createElement("th");
                            thCcy.innerText = 'Валюта';
                            let thBaseCcy = document.createElement("th");
                            thBaseCcy.innerText = 'UA';
                            let thBuy = document.createElement("th");
                            thBuy.innerText = 'Покупка';
                            let thSale = document.createElement("th");
                            thSale.innerText = 'Продажа';
                            
                            headerTR.appendChild(thCcy);
                            headerTR.appendChild(thBaseCcy);
                            headerTR.appendChild(thBuy);
                            headerTR.appendChild(thSale);
                            contentTable.appendChild(headerTR);
                            
                            rates.forEach(function (val) {
                                let tr = document.createElement("tr");
                                let ccy = document.createElement("td");
                                let base_ccy = document.createElement("td");
                                let buy = document.createElement("td");
                                let sale = document.createElement("td");
                                
                                ccy.innerText = val.ccy;
                                base_ccy.innerText = val.base_ccy;
                                buy.innerText = parseFloat(val.buy).toFixed(2);
                                sale.innerText = parseFloat(val.sale).toFixed(2);
                                
                                if(val.ccy === 'BTC') {
                                    return;
                                }
                                tr.appendChild(ccy);
                                tr.appendChild(base_ccy);
                                tr.appendChild(buy);
                                tr.appendChild(sale);
                                
                                contentTable.appendChild(tr);
                                contentDiv.appendChild(contentTable);
                            });
                        } else {
                            contentDiv.style.backgroundColor = "red";
                            contentDiv.style.color = "#fff";
                            contentDiv.innerText = "Неудача!";
                        }
                    }
                };
                xhr.send();
            };
        </script>
    </body>
</html>
    