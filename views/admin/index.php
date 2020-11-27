<table>
    <caption>Films</caption>
    <thead>
    <tr>
        <th>#</th>
        <th>year</th>
        <th>name</th>
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
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/admin/edit">
                        <input type="hidden" name="id" value="<?= $film['id'] ?>">
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    <?php endif; ?>
</table>
<a href="/admin/create">Create</a>