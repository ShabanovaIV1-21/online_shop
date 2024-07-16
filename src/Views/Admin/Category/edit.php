<div class="container">
    <h1 class="mt-4 mb-2">Редактирование категории</h1>

    <?php if (!empty($error)):?>
        <div style="color:red"><?=$error?></div>
    <?php endif;?>

    <form action='/online_shop/admin/category/<?=$category->getId()?>/edit' method="post">
        <div  class='d-flex flex-column col-3'>
            <div class="mb-2">
                <label class="form-label">Название категории <br>
                    <input type='text' id='name' name="name" class="mt-1 form-control" value="<?=$_POST['name'] ?? $category->getTitle()?>" size='50'>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Описание<br>
                    <textarea id='desc' name="desc" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['desc'] ?? $category->getDescription()?></textarea>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Родительская категория <br>
                    <select id='parentId' name="parentId" class="mt-1 form-control form-select">
                        <option value="0">Категория</option>
                        <?php foreach ($categories as $val) {echo ($_POST['parentId'] == $val->getId() || $val->getId() == $category->getParentId())?"<option selected value='" . $val->getId() . "'>" . $val->getTitle() . "</option>":"<option value='" . $val->getId() . "'>" . $val->getTitle() . "</option>";}?>
                    </select>
                </label >
            </div>
        
        <input type="submit" value="Сохранить" class="btn btn-primary col-6">
        </div>
        

    </form>
</div>
