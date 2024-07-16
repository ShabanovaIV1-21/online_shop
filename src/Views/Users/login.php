<div class="container">
    <h1 class="mt-4 mb-2">Вход</h1>
    <?php
    if (!empty($error)):?>
    <div style="color:red"><?=$error?></div>
    <?php endif;?>
    <form action="/online_shop/users/login" method="POST">
        <div  class="d-flex flex-column col-3">
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
            
            <br>
            <input type="submit" value="Войти" class="btn btn-primary col-6">
        </div>
        
    </form>
</div>
