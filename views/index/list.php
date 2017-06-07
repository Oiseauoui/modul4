<?php foreach ($data as $category => $item) {
        if (isset($item['id_category'])) {
            $b[$item['category_name']] = $item['id_category'];
        }
    } ?>
    <?php foreach ($b as $key => $item): ?>
        <h2><a href="/category/list/<?= $item ?>"><?= $key ?></a></h2>
        <?php foreach ($data as $category): ?>
            <?php if (isset($category['id_category']) && $category['id_category'] == $item): ?>
                <ul class="list-unstyled">
                    <li><a href="/news/list/<?= $category['id_news'] ?>"><?= $category['title_news']; ?></a></li>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
<div class="slider">
    <ul>
        <?= $cnt = 0; ?>
        <?php foreach ($data as $key => $value) : ?>
        <?php if (($value['image_news'])): ?>
        <?= $cnt++; ?>
        <?php if ($cnt == 5) break; ?>
        <li>
            <a href="/news/list/<?= $value['id_news']; ?>">
                <div><h4><?= $value['title_news']; ?></h4>
                <img src="/webroot/image/<?= $value['image_news']; ?>">
            </a>
</div>
</li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
</div>

<!--слайдеры-->

<script type="text/javascript">
    $(document).ready(function () {
        $(".slider").each(function () { // обрабатываем каждый слайдер
            var obj = $(this);
            $(obj).append("<div class='nav'></div>");
            $(obj).find("li").each(function () {
                $(obj).find(".nav").append("<span rel='" + $(this).index() + "'></span>"); // добавляем блок навигации
                $(this).addClass("slider" + $(this).index());
            });
            $(obj).find("span").first().addClass("on"); // делаем активным первый элемент меню
        });
    });
    function sliderJS(obj, sl) { // slider function
        var ul = $(sl).find("ul"); // находим блок
        var bl = $(sl).find("li.slider" + obj); // находим любой из элементов блока
        var step = $(bl).width(); // ширина объекта
        $(ul).animate({marginLeft: "-" + step * obj}, 500); // 500 это скорость перемотки
    }
    $(document).on("click", ".slider .nav span", function () { // slider click navigate
        var sl = $(this).closest(".slider"); // находим, в каком блоке был клик
        $(sl).find("span").removeClass("on"); // убираем активный элемент
        $(this).addClass("on"); // делаем активным текущий
        var obj = $(this).attr("rel"); // узнаем его номер
        sliderJS(obj, sl); // слайдим
        return false;
    });
</script>
<h2>Top 5 комментаторов:</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th>№</th>
        <th>Имя:</th>
        <th>Кол-во:</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach ($data['commentator'] as $commentator): ?>
        <tr>
            <td><?=$i++?></td>
            <td><a href="/comments/list/<?=$commentator['id_user']?>"><?=$commentator['login']?></a></td>
            <td><?=$commentator['cnt']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<h2>Top 3 обсуждаемых темы:</h2>
<div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>№</th>
        <th>Название:</th>
        <th>Кол-во комментариев:</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach ($data['themes'] as  $theme): ?>
        <tr>
            <td><?=$i++?></td>
            <td><a href="/news/theme/<?=$theme['id_news']?>"><?=$theme['title_news']?></a></td>
            <td><?=$theme['comment']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>