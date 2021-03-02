<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>
  <!-- Add global css here -->
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
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