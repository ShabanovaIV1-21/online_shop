<div class="container">
    <h1 class="mt-4 mb-2">Личный кабинет</h1>
    <a href="/project.loc/personal/orders" class="btn btn-primary">Заказы</a>

    <?php if (!empty($error)): ?>
        <div style="color:red"><?= $error ?></div>
    <?php endif; ?>

    <h3 class="mt-4 mb-2">Настройки профиля</h3>
    <form action="/project.loc/personal" method="POST">
        <div class="d-flex flex-column col-3">
            <div class="mb-2">
                <label class="form-label">Имя <br>
                    <input name="nickname" type="text" class="form-control"
                        value="<?= $_POST['nickname'] ?? $user->getNickname() ?>">
                </label class="form-label">
            </div>

            <div class="mb-2">
                <label>Email <br>
                    <input name="email" class="form-control" value="<?= $_POST['email'] ?? $user->getEmail() ?>">
                </label class="form-label">
            </div>
            <div class="mb-2">
                <label>Пароль <br>
                    <input name="password" class="form-control" value="<?= $_POST['password'] ?? '' ?>">
                </label>
            </div>
            <div class="mb-2">
                <label>Подтверждение пароля <br>
                    <input name="password_repeat" class="form-control" value="<?= $_POST['password_repeat'] ?? '' ?>">
                </label>
            </div>
            
            <br>
            <input type="submit" value="Сохранить" class="btn btn-primary col-6">
        </div>

    </form>
</div>
