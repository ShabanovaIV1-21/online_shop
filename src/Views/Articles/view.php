<div class="container">
    <h1 class="mt-4 mb-2"><?=$article->getName()?></h1>
    <p><?=$article->getText()?></p>
    <p>Автор: <?=$article->getAuthor()->getNickname()?></p>
</div>

