<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.username = "<?= session()->get('user')['username'] ?>"; <?php // this should be encrypted but I don't care about security for now ?>
    const sendEndpoint = "<?= route_to('message.send') ?>";
    const inboxEndpoint = "<?= route_to('message.inbox', 1, 1) ?>";
    const conversationEndpoint = "<?php //route_to('message.conversation') ?>";
</script>
<script src="<?= base_url('js/messages.js') ?>"></script>