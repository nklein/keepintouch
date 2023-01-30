<?= $this->extend('\App\Views\layout') ?>

<?= $this->section('title') ?><?= esc($title)?><?= $this->endSection() ?>

<?= $this->section('main') ?>
  <h1><?= esc($title) ?></h1>
  <p><i class="bi-info-circle"></i> <?= esc($message) ?></p>
<?= $this->endSection() ?>
