<div class="starter-template" style="min-height:300px; ">
    <?php if (!isset($data['tags'][0]['id_news'])) : ?>
        <ul class="list-unstyled">
            <?php foreach ($data['tags'] as $key => $value): ?>
                <li><a href="/news/tag/<?= $key; ?>"><?= $value ?> </a></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <ul class="list-unstyled">
            <?php foreach ($data['tags'] as $key => $value): ?>
                <li><a href="/news/list/<?= $value['id_news']; ?>"><?= $value['title_news'] ?> </a></li>
            <?php endforeach; ?>
        </ul>

        <?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
        <ul class="pagination pagination-lg">
            <?php for ($j = 1; $j <= ($data['tags']['count']); $j++) : ?>
                <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                            href="/news/tag/?pages=<?= $j; ?>"><?= $j; ?></a></li>
            <?php endfor; ?>
        </ul>

    <?php endif; ?>

</div>