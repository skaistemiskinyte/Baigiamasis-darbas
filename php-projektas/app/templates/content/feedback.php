<?php
/**
 * @var array $data
 */
?>
<h1>Mūsų klientų atsiliepimai</h1>

<?php if (empty($data['feedbacks'])) : ?>
    <p>Atsiliepimų (kol kas) nėra. Būkit pirmuoju!</p>
<?php else : ?>
    <table>
        <?php foreach ($data['feedbacks'] as $feedback) : ?>
            <tr>
                <td><?= htmlspecialchars($feedback['text']) ?></td>
                <td><?= htmlspecialchars($feedback['name']) ?></td>
                <td><?= date('Y-m-d', $feedback['timestamp']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php if (empty($data['username'])) : ?>
    <p>
        Norite parašyti komentarą?
        <a href="<?= \Core\Router::getUrl('register') ?>">Užsiregistruokite</a>
    </p>
<?php else : ?>
    <?= $data['form'] ?>
<?php endif; ?>

