<div class="stars">
    <?php for($i = 1; $i <= 5; $i++): ?>
        <?php if ($rating >= $i): ?>
            <span class="fa fa-star checked"></span>
        <?php else: ?>
            <span class="fa fa-star"></span>
        <?php endif; ?>
    <?php endfor; ?>
    <span><?= $rating ?></span>
</div>