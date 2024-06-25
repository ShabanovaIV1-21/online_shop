<div class="container">
    <h1 class="mt-4 mb-2">Регистрация</h1>
    <?php
    if (!empty($error)):?>
    <div style="color:red"><?=$error?></div>
    <?php endif;?>
    <form action="/project.loc/users/register" method="POST">
        <div  class="d-flex flex-column col-3">
            <div class="mb-2">
                <label class="form-label">Имя <br>
                    <input name="nickname" type="text" class="form-control mt-1" value="<?=$_POST['nickname'] ?? ''?>">
                </label class="form-label">
            </div>
            <div class="mb-2">
                <label>Email <br>
                    <input name="email" class="form-control mt-1" value="<?=$_POST['email'] ?? ''?>">
                </label class="form-label">
            </div>
            <div class="mb-2">
                <label>Пароль <br>
                    <input name="password" type="password" class="form-control mt-1" value="<?=$_POST['password'] ?? ''?>">
                </label>
            </div>
            <div class="mb-2">
                <label>Подтверждение пароля <br>
                    <input name="password_repeat" type="password" class="form-controlmt-1" value="<?=$_POST['password_repeat'] ?? ''?>">
                </label>
            </div>
            
            <br>
            <input type="submit" value="Зарегистрироваться" class="btn btn-primary col-6">
        </div>
        
    </form>
</div>
