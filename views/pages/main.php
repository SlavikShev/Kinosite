<h2>Films</h2>
<?php foreach ($this->films as $film): ?>
    <table>
        <tr>
            <td><?= $film['title'] ?></td>
        </tr>
    </table>
<?php endforeach; ?>