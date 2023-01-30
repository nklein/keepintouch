<?= $this->extend('\App\Views\layout') ?>

<?= $this->section('title') ?><?= esc(lang('Home.title'))?><?= $this->endSection() ?>

<?= $this->section('main') ?>
  <h1><?= esc(lang('Home.title')) ?></h1>
  <p><i class="bi-stack"></i> <?= lang('Home.contentHere') ?></p>
<?= $this->endSection() ?>
