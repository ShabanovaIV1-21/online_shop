<div class="container">
    <h1 class="mt-4 mb-2">Статьи</h1>
    <a href="/project.loc/articles/add" class="btn btn-danger btn-top">Добавить стаью</a>
    <table  class="table table-borderless">
    <?php
    foreach ($articles as $article) : ?>
    <tr>
            <td><h3><a class="list" href="/project.loc/articles/<?=$article->getId()?>"><?=$article->getName()?>, <?=$article->getCreatedAt()?></a></h3> </td>
            <td><a href="/project.loc/articles/<?=$article->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
            <td><a href="/project.loc/articles/<?=$article->getId()?>/delete" class="btn btn-primary">Удаление</a></td>

        </tr>
    <?php endforeach; ?>
    </table>
    <div class="page">
    <?php for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++):?>
        <?php if ($currentPageNum === $pageNum): ?>
            <?=$pageNum?></b><?php else: ?>
        <a href="/project.loc/articles<?=$pageNum === 1 ? '' :  '/page/' . $pageNum?>">
        <?=$pageNum?>
        </a>
        <?php endif?>
    <?php endfor?>

    </div>
</div>