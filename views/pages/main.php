<div class="main-box_content">
<h2>Welcome to the greatest film site</h2>
<?php if (count($this->films)): ?>
    <?php foreach ($this->films as $film): ?>
        <div class="content-table">
            <h2>
                <td><?= $film['name'] ?></td>
            </h2>
            <pre>
                <td><?= $film['description'] ?></td>
            </pre>
            <p>
                <td><?= $film['year'] ?></td>
            </p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
<p>Sorry, there are no films yet</p>
<?php endif ?>
</div>
