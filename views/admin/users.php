<div class="usersBtns">
    <a href="/admin/createaccount">
        <div class="usersMenu">
            <i class="fas fa-user-plus"></i>
            Add User
        </div>
    </a>
</div>
<div>
    <table class="tableStyle">
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
                                <button type="submit" class="redBG"><i class="fas fa-trash"></i></button>
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