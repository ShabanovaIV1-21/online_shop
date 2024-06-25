<div class="container">
    <h1 class="mt-4 mb-2">Наш каталог</h1>

    <?php foreach ($categories as $val) : ?>
        <?php if ($val->getParentId() == 0): ?>

        <h3><a class="list" href="/project.loc/categories/<?=$val->getId()?>"><?=$val->getTitle()?></a> <?=$val->getDescription()?></h3>
        <?php endif;?>
    <?php endforeach; ?>
</div>
