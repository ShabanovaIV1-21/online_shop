<div class="container">
    <h1 class="mt-4 mb-2">Создание новой статьи</h1>

    <?php if (!empty($error)):?>
        <div style="color:red"><?=$error?></div>
    <?php endif;?>

    <form action='/online_shop/articles/add' method="post">
        <div  class='d-flex flex-column col-3'>
            <div class="mb-2">
                <label class="form-label">Название статьи <br>
                    <input type='text' id='name' name="name" class="mt-1 form-control" value="<?=$_POST['name'] ?? ''?>" size='50'>
                </label>
            </div>
            
            <div class="mb-2">
                <label class="form-label">Текст статьи <br>
                    <textarea id='text' name="text" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['text'] ?? ''?></textarea>
                </label>
            </div>
            

            <input type="submit" value="Создать" class="btn btn-primary col-6">
        </div>
        

    </form>
</div>
