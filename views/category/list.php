<div class="starter-template">
    <?php if (isset($data['category_list']))  : ?>
        <h2>Категории новостей</h2>
        <ul class="category">
            <?php foreach ($data['category_list'] as $key => $value): ?>
                <li><a href="/category/list/<?= $key; ?>"><?= $value; ?></a></li>
            <?php endforeach; ?>
        </ul>

    <?php else : ?>
        <h2 class = "category"><?php $data['category'][0]['category_name']; ?></h2>
        <?php for ($i = 0; $i < count($data['category']); $i++) : ?>
            <ul class="list-unstyled">
                <li>
                    <a href="/news/list/<?= $data['category'][$i]['id_news']; ?>"><?= $data['category'][$i]['title_news']; ?></a>
                </li>
            </ul>

        <?php endfor; ?>

</div>

<?php
if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<ul class="pagination pagination-lg">
    <?php for ($j = 1; $j <= ($data['category']['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>>
            <a href="/category/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>

    <?php endfor; ?>
</ul>
<?php endif; ?>


