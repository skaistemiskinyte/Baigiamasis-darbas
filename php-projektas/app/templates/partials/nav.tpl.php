<nav class="wrapper">
    <?php foreach ($data as $value) : ?>
        <a class="<?= $value['class'] ?>" href="<?= $value['url']; ?>">
            <?= $value['title']; ?>
        </a>
    <?php endforeach; ?>
</nav>
