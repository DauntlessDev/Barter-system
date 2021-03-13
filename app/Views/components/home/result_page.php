<div class="wrapper">
    <div class="fresh-finds">
        <div class="fresh-finds-header">
            <p>Search Result</p>
        </div>
        <?php if($results): ?>
            <div class="product-list">
                <?php 
                foreach($results as $result):
                    $poster_info = $class->getPosterInfo($result['poster_uid']);
                    echo view_cell('\App\Libraries\Product::getItem', ['item' => $result, 'poster'=> $poster_info[0]]);
                endforeach; ?>
            </div>
            <!-- <div class="bottom-end">
                <button>View more</button>
            </div> -->
        <?php else: ?>
            <div class="product-list-noresult">
                <div class="product-list-noresult-inner">
                    <img src="assets/home/noresult-icon.png" width="130px"/>
                    <div class="noresult-text">Item name did not match any of the existing products.</div>
                </div>
            </div>
        <?php endif;?>

    </div>
</div>
