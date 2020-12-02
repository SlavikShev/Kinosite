<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button type="button" id="load">Load data</button>
    <div id="content"></div>
    <script>
        document.getElementById('load').onclick = function(){
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4){
                    if(xhr.status == 200){
                        let responseString = xhr.responseText;
                        let rates = JSON.parse(responseString);
                        let contentDiv = document.getElementById('content');
                        contentDiv.innerHTML = '';
                        let table = document.createElement('table');
                        let tr = document.createElement('tr');
                        let thCurrency = document.createElement('th');
                        thCurrency.innerText = 'Валюта';
                        let thBuy = document.createElement('th');
                        thBuy.innerText = 'Покупка';
                        let thSale = document.createElement('th');
                        thSale.innerText = 'Продажа';
                        tr.append(thCurrency);
                        tr.append(thBuy);
                        tr.append(thSale);
                        table.append(tr);
                        rates.forEach(function(val){
                            if(val.ccy === 'BTC'){
                                return;
                            }
                            let tr = document.createElement('tr');
                            let tdCurrency = document.createElement('td');
                            tdCurrency.innerText = val.ccy;
                            let tdBuy = document.createElement('td');
                            tdBuy.innerText = parseFloat(val.buy).toFixed(2);
                            let tdSale = document.createElement('td');
                            tdSale.innerText = parseFloat(val.sale).toFixed(2);
                            tr.append(tdCurrency);
                            tr.append(tdBuy);
                            tr.append(tdSale);
                            table.append(tr);
                            //contentDiv.innerHTML+='<p>'+val.ccy+'</p>';
                        });
                        contentDiv.append(table);
                    }else{
                        alert('error');
                    }
                }
            };
            xhr.send();
        };
    </script>
</body>
</html>
