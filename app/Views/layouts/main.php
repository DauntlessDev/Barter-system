<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title><!-- Render Title -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <!-- Add global css here -->
  <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/index.css') ?>">
  <!-- Page specific css renders here -->
  <?= $this->renderSection('css') ?>
</head>

<!-- Include Navbar -->
<?= $this->include('partials/navbar') // located in View/partials/navbar.php ?>

<body>
  <main class="container">
    <!-- Renders Main Content -->
    <?= $this->renderSection('content') ?>
  </main>

</body>

</html>