<!doctype html>
<html>
  <head>
    <title><?= $this->renderSection('title') ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="/site.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,500;1,400;1,500&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <body class="theme-dark">
    <main class="container">
      <?= $this->renderSection('main') ?>
    </main>
    <script src="/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script type="text/javascript">
     function setDarknessMode(dark) {
         let body = document.querySelector('body');
         if (dark) {
             body.classList.replace('theme-light', 'theme-dark');
         } else {
             body.classList.replace('theme-dark', 'theme-light');
         }
     }
     let matcher = window.matchMedia('(prefers-color-scheme: dark)');
     matcher.addEventListener('change', function (e) {
             setDarknessMode(e.matches);
         });
     setDarknessMode(matcher.matches);
    </script>
  </body>
</html>
