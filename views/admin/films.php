<div class="usersBtns">
    <a href="/admin/create">
        <div class="usersMenu">
            <i class="far fa-file-video"></i>
            Add Film
        </div>
    </a>
</div>
<div>
    <table class="tableStyle">
        <caption>Films</caption>
        <thead>
        <tr>
            <th>#ID</th>
            <th>Year</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody id="all-films"></tbody>
    </table>
</div>

<script>
    function loadFilms() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/api/index');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    let responseString = xhr.responseText;
                    let films = JSON.parse(responseString);
                    let contentTable = document.querySelector('#all-films');
                    contentTable.innerHTML = '';
                    films.forEach(function (film) {
                        contentTable.innerHTML += `<tr><td>${film.name}</td><td>${film.year}</td><td><form method="post">
                            <input type="hidden" name="id" value="${film.id}" ><button type="submit" class="redBG" ><i class="fas fa-trash"></i></button></form></td><td><form action="/admin/edit" method="POST"><input type="hidden" name="id" value="${film.id}"><button type="submit" class="yellowBG"><i class="fas fa-pencil-alt"></i></button></form></td></tr>`;
                    });
                    let forms = document.querySelectorAll('form');//получаем только формы удаления
                    for(let i=0; i<forms.length; i++){
                        forms[i].onsubmit = function (event) {
                            let id = this.elements.id.value;
                            let xhr = new XMLHttpRequest();
                            xhr.open('POST', '/api/delete');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4) {
                                    if (xhr.status == 200) {
                                        loadFilms();
                                    }else{
                                        alert('delete was failed');
                                    }
                                }
                            };
                            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                            xhr.send('id='+id);
                            event.preventDefault();
                        };
                    }
                } else {
                    alert('error');
                }
            }
        };
        xhr.send();
    }


    loadFilms();
    setInterval(loadFilms, 10000);



</script>
