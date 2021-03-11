<div class="wrapper">
    <div class="feature">
        <img src="<?= base_url('assets/home/feature-sample.jpg') ?>"  alt="feature" class="feature-img">
    </div>

    <div class="explore">
        <div class="explore-header">
            <p>Explore Items</p>
        </div>
        <div class="category-container">
        <?php foreach($categories as $category): ?>
            <?= view_cell('\App\Libraries\Category::getCategory', ['category' => $category]) ?>
        <?php endforeach; ?>
        </div>
    </div>

    <div class="fresh-finds">
        <div class="fresh-finds-header">
            <p>Fresh Finds</p>
        </div>
        <div class="product-list">
            <?php foreach($latestItems as $latestItem):
                $poster_info = $class->getPosterInfo($latestItem['poster_uid']);
                echo view_cell('\App\Libraries\Product::getItem', ['item' => $latestItem, 'poster'=> $poster_info[0]]);
            endforeach; ?>
        </div>
        <div class="bottom-end">
            <button>View more</button>
        </div>
    </div>
</div>
