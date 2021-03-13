<?php $item_name = ""; ?>
<div class="header" >
    <img src="<?= base_url('assets/home/logo.png') ?>" alt="feature" class="logo">
    <form method="GET" action="<?php echo base_url("result");?>">
        <div class="search-bar">
            <input type="text" class="search-input" name="item_name" id="item_name" value="<?php echo $item_name;?>">
            <input type="submit" id="search" name="search" value="Search" class="search-button" >
        </div>
    </form> 
    <button class="sell-button">Sell</button>
</div>