<div class="container">
    <h1 class="mt-4 mb-2">Пользователи</h1>
    <table class="table">
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?=$user->getNickname()?></td>
                <td><?=$user->getEmail()?></td>
                <td><a href="/project.loc/users/<?=$user->getId()?>" class="btn btn-primary">Просмотр</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
