<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>
  <!-- Add global css here -->
  <link rel="stylesheet" href="<?= base_url('css/template/nav.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/template/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/template/footer.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="assets/home/  favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/home/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
  <!-- Page specific css renders here -->
  <?= $this->renderSection('css') ?>
</head>
<body>

    <?= $this->include('template/nav'); ?>
    <?= $this->include('template/header'); ?>
    <?= $this->renderSection('content');?>
    <?=  $this->include('template/footer'); ?>

</body>

</html>