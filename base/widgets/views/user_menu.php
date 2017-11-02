<h1 class="page-header text-center">
    User Menu
</h1>
<ul class="nav nav-tabs nav-stacked user-nav">
    <?php foreach ($items as $item) { ?>
    <li <?= $item['active'] ? 'class="active"' : '' ?> >
        <a href="<?= \yii\helpers\Url::to($item['url']); ?>">
            <i class="fa <?= $item['icon'] ?>"></i>
            <?= $item['label'] ?>
        </a>
    </li>
    <?php } ?>
</ul>