<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, tr,td{
            border: black 1px solid;
            border-collapse: collapse;
        }
    </style>
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
                    contentDiv.innerHTML = '<table></table>';
                    let contentTable = document.querySelector('#content table');
                    rates.forEach(function(val){
                        if(val.ccy === 'BTC'){
                            return;
                        }
                        contentTable.innerHTML+=
                            '<tr>' +
                            '<td>'+val.ccy+'</td>' +
                            '<td>'+parseFloat(val.buy)+'</td>' +
                            '<td>'+parseFloat(val.sale)+'</td>' +
                            '</tr>';
                    });
                }else{
                    let contentDiv = document.getElementById('content');
                    contentDiv.innerHTML = 'Error';
                    contentDiv.style.backgroundColor = "#ff0000";
                }
            }
        };
        xhr.send();
    };
</script>
</body>
</html>
