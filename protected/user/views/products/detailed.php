<?php
$value = rtrim($product->category_id, ',');
$ids = explode(',', $value);
foreach ($ids as $id) {
        $cat_name = ProductCategory::model()->findByPk($id)->category_name;
}
?>



<div class="container">
    <div class="row">
        <div >
            <?php
            $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
            ?>

            <figure> <img src="<?= Yii::app()->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image; ?>"></figure>



            <ul class="list-unstyled list-inline prices">

                <h3><?= 'name: ' . $product->product_name; ?></h3>
                <span><?= 'Product Code :' . $product->product_code; ?></span><br>
                <span><?= 'Price: ' . $product->price; ?></span><br>
                <p><?= 'Description' . $product->description; ?></p>
                <br>

            </ul>
        </div>

    </div>
</div>

