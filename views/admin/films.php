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
        <?php if (count($this->films)): ?>
            <tbody>
            <?php foreach ($this->films as $film): ?>
                <tr>
                    <td><?= $film['id'] ?></td>
                    <td><?= $film['year'] ?></td>
                    <td><?= $film['name'] ?></td>
                    <td>
                        <form method="post" action="/admin/delete">
                            <input type="hidden" name="id" value="<?= $film['id'] ?>">
                            <button type="submit" class="redBG"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/edit">
                            <input type="hidden" name="id" value="<?= $film['id'] ?>">
                            <button type="submit" class="yellowBG"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</div>
