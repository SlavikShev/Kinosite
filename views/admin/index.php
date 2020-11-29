<div>
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
</div>
<div>
    <table>
        <caption>Users</caption>
        <thead>
        <tr>
            <th>#ID</th>
            <th>Login</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php if(count($this->users)): ?>
            <tbody>
                <?php foreach($this->users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['login'] ?></td>
                        <?php if($user['id'] > 1) :?>
                        <td>
                            <form method="post" action="/admin/deleteuser">
                                <input type="hidden" name="userid" value="<?= $user['id'] ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                        <?php else :?>
                        <td>
                            I'm the GOD :D
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        <?php endif; ?>
    </table>
</div>