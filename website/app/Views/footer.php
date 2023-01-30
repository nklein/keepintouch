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
