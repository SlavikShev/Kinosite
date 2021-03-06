<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            margin-top: 1rem;
        }

        td, th {
            padding: 5px;
        }

        table, tr, th, td {
            border: 1px solid #000000;
            border-collapse: collapse;
        }

        p {
            color: #dc143c;
        }
    </style>
    <title>Document</title>
</head>
<body>
<button type="button" id="load">Load data</button>
<div id="content"></div>
<script>
    document.getElementById('load').onclick = function () {
        let xhr = new XMLHttpRequest();
        let contentDiv = document.getElementById('content');
        xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    let responseString = xhr.responseText;
                    let rates = JSON.parse(responseString);
                    contentDiv.innerHTML = '';
                    contentDiv.innerHTML +=
                        '<table>' +
                        '<tr>' +
                        '<th>Currency</th>' +
                        '<th>Buy</th>' +
                        '<th>Sale</th>' +
                        '</tr>' +
                        '</table>';
                    rates.forEach(function (val) {
                        if (val.ccy === 'BTC') {
                            return;
                        }
                        document.querySelector('#content table').innerHTML += '<tr><td>' + val.ccy + '</td><td>' + parseFloat(val.buy).toFixed(2) + '</td><td>' + parseFloat(val.sale).toFixed(2) + '</td></tr>';
                    });
                } else {
                    contentDiv.innerHTML = '<p>' + 'Error loaing data' + '</p>';
                }
            }
        };
        xhr.send();
    };
</script>
</body>
</html>
