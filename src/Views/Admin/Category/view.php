<h1><?=$category->getTitle()?></h1>
Описание
<p><?=$category->getDescription()?></p>
<p>Родительская категория: <?=$parentCategory?></p>

<a href="/project.loc/admin/category/<?=$category->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
<a href="/project.loc/admin/category/<?=$category->getId()?>/delete" class="btn btn-primary">Удаление</a>
