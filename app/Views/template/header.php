<div class="header" >
    <img src="<?= base_url('assets/home/logo.png') ?>" alt="feature" class="logo">
    <form method="GET" action="<?= route_to("result");?>">
        <div class="search-bar">
            <input placeholder=" Search for an item" type="text" class="search-input" name="item_name" id="item_name">
            <button type="submit" id="search" name="search" class="btn btn-success search-button">
                <div class="fa fa-search icon-large "></div> 
            </button>
        </div>
    </form> 
    <button class="sell-button">Sell</button>
</div>