<div class="offerbutton">
    <?php // TODO: This needs refactoring(if there's time), store message and offer button state to a variable ?>
    <?php if (strtolower($item['avail_status']) === 'unavailable'): ?>
        <button class="message disabled" title="This item is no longer available">Message</button>
        <button class="offer disabled" title="This item is no longer available">Offer</button>
    <?php else: ?>
        <?php if (session()->get('user') !== null) : ?>
            <?php // check if the user is not the owner ?>
            <?php if (session()->get('user')['user_id'] !== $user['user_id']): ?>
                <button class="message" onclick="window.location='<?= $msgURL ?>'">Message</button>
                <?php if ($canPlaceOffer): ?>
                    <button class="offer" onclick="window.location='<?= route_to('placeOffer', $item['item_id']); ?>'">Offer</button>
                <?php else: ?>
                    <button class="offer disabled" title="You already have a pending offer">Offer</button>
                <?php endif; ?>
                <?php // if the user is owner, disable all buttons?>
            <?php else : ?>
                <button class="message disabled" title="You cannot message yourself">Message</button>
                <button class="offer disabled" title="You cannot place offer to your own item">Offer</button>
            <?php endif; ?>
        <?php // if the user is not logged in ?>
        <?php else : ?>
            <button class="message" onclick="window.location='<?= $msgURL ?>'">Message</button>
            <button class="offer" onclick="window.location='<?= route_to('placeOffer', $item['item_id']); ?>'">Offer</button>
        <?php endif; ?>
    <?php endif; ?>
</div>