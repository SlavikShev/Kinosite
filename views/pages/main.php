<h2 class="content_h2">Welcome to the greatest film site</h2>
<div class="main-box_content"></div>
<script>
    function loadFilms() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/index');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    let responseString = xhr.responseText;
                    let films = JSON.parse(responseString);
                    let contentDiv = document.querySelector('.main-box_content');
                    contentDiv.innerHTML = '';
                    films.forEach(function (film) {
                        contentDiv.innerHTML += '<div>' + film.name + ' ' + film.year + '</div>';
                    })
                } else {
                    alert('error');
                }
            }
        };
        xhr.send();
    }

    loadFilms();
    setInterval(loadFilms, 10000)


</script>
