<?php if($avail_status === 'available'): ?>
    <p class="availstatus available"><?= $avail_status ?></p>
<?php elseif($avail_status === 'pending'): ?>
    <p class="availstatus pending"><?= $avail_status ?></p>
<?php elseif($avail_status === 'unavailable'): ?>
    <p class="availstatus unavailable"><?= $avail_status ?></p>
<?php endif; ?>