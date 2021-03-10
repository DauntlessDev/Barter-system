<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.user_id = "<?= session()->get('user')['user_id'] ?>"; <?php // this should be encrypted but I don't care about security for now ?>
    window.sendEndpoint = "<?= route_to('message.send') ?>";
    window.inboxEndpoint = "<?= route_to('message.inbox') ?>";
    window.conversationEndpoint = "<?= route_to('message.conversation') ?>";
</script>
<script src="<?= base_url('js/messages.js') ?>"></script>