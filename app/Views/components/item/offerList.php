<?php if ((session()->get('user')['user_id'] ?? null) === $item['poster_uid']) : ?>
<div class="offerlist-container">
    <?php if (strtolower($item['avail_status']) === 'unavailable'): ?>
        <h1>You already accepted an offer</h1>
    <?php else: ?>
        <div class="list-container">
            <?php foreach($offers as $offer) : ?>
                <div class="offer-container">
                    <div class="text-content">
                        <h3 class="subject-title"><?= $offer['offer_msg_title'] ?></h3>
                        <h4 class="message-view"><?= $offer['offer_msg_content'] ?></h4>
                    </div>
                    <form action="<?= route_to('acceptOffer', $item['item_id']) ?>" method="POST">
                        <button class="accept_button" type="submit">Accept Offer</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>