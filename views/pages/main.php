<div class="main-box_content">
    <h2 class="content_h2">Welcome to the greatest film site</h2>
    <?php if (count($this->films)): ?>
        <?php foreach ($this->films as $film): ?>
            <div class="content-table">
                <h2>
                    <?= $film['name'] ?>
                </h2>
                <p><?= $film['description'] ?></p>
                <p>Year:<?= $film['year'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Sorry, there are no films yet</p>
    <?php endif ?>
</div>
