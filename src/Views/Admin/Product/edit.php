<div class="container">
    <h1 class="mt-4 mb-2">Редактирование товара</h1>

    <?php if (!empty($error)):?>
        <div style="color:red"><?=$error?></div>
    <?php endif;?>

    <form action='/online_shop/admin/product/<?=$product->getId()?>/edit' method="post" enctype="multipart/form-data">
        <div  class='d-flex flex-column col-3'>
            <div class="mb-2">
                <label class="form-label">Название товара <br>
                    <input type='text' id='title' name="title" class="mt-1 form-control" value="<?=$_POST['title'] ?? $product->getTitle()?>" size='50'>
                </label >
            </div>
        
            <div class="mb-2">
                <label class="form-label">Содержание<br>
                    <textarea id='content' name="content" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['content'] ?? $product->getContent()?></textarea>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Описание<br>
                    <textarea id='desc' name="desc" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['desc'] ?? $product->getDescription()?></textarea>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Категория <br>
                    <select id='categoryId' name="categoryId" class="mt-1 form-select form-control">
                        <option selected value="">Категория</option>
                        <?php foreach ($categories as $val) {echo ($_POST['categoryId'] == $val->getId() || $product->getCategoryId() == $val->getId())?"<option selected value='" . $val->getId() . "'>" . $val->getTitle() . "</option>":"<option value='" . $val->getId() . "'>" . $val->getTitle() . "</option>";}?>
                    </select>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Цена товара <br>
                    <input type='number' min='0' max='9999.99' step='0.01' id='price' name="price" class="mt-1 form-control" value="<?=$_POST['price'] ?? $product->getPrice()?>" size='50'>
                </label>
            </div>
        
            <div class="mb-2">
                <label class="form-label">Изображение<br>
                    <input type="file" class="mt-1 form-control" name="img" id="img">
                </label>
            </div>
       

            <input type="submit" value="Сохранить" class="btn btn-primary col-6">
        </div>
        

    </form>
</div>
