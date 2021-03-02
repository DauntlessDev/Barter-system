<div class="header">
    <img src="assets/home/logo-sample.svg" alt="feature" class="logo">
    <div class="search-bar">
        <input class="search-input"></input>
        <button class="search-button">Find</button>
    </div>
    <button class="sell-button">Sell</button>
</div>

<div class="wrapper">
    <div class="feature">
        <img src="assets/home/feature-sample.jpg"  alt="feature" class="feature-img">
    </div>

    <div class="explore">
        <div class="explore-header">
            <p>Explore Items</p>
        </div>
        <div class="category-container">
            <?php for ($x = 1; $x <= 10; $x++) :?>
                <?= $this->include('components/home/category') ?>
            <?php endfor ?>
        </div>
    </div>

    <div class="fresh-finds">
        <div class="fresh-finds-header">
            <p>Fresh Finds</p>
        </div>
        <div class="product-list">
            <?php for ($x = 1; $x <= 10; $x++) :?>
                <?= $this->include('components/home/product') ?>
            <?php endfor ?>
        </div>
    </div>

    <div class="bottom-end"></div>
</div>
