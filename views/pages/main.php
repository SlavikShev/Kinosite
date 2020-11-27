<h2>Welcome to the greatest film site</h2>
<?php if (count($this->films)): ?>
    <?php foreach ($this->films as $film): ?>
        <table>
            <tr>
                <td><?= $film['name'] ?></td>
            </tr>
            <tr>
                <td><?= $film['description'] ?></td>
            </tr>
            <tr>
                <td><?= $film['year'] ?></td>
            </tr>
        </table>
    <?php endforeach; ?>
<?php else: ?>
    <p>Sorry, there are no films yet</p>
<?php endif ?>