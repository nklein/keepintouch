<div class="welcomepage">

  <header>
    <img id="logo"
         src="/images/CareForFriends-Logo-ScreenRes.png"
         alt="<?= esc(lang('Site.logoAlt')) ?>"/>
    <h1><?= esc(lang('Site.title')) ?></h1>
    <div class="btn-toolbar gap-1" role="toolbar" aria-label="Sign-in buttons">
      <a href="/login" type="button" class="btn btn-primary"><?= esc(lang('Auth.login')) ?></a>
      <a href="/register" type="button" class="btn btn-secondary"><?= esc(lang('Auth.register')) ?></a>
    </div>
  </header>

  <section>
    <h2><?= esc(lang('Welcome.whatWeDo')) ?></h2>

    <p><?= esc(lang('Welcome.whatWeDoIntroParagraph')) ?></p>
    <p><?= esc(lang('Welcome.whatWeDoUserParagraph')) ?></p>
  </section>

</div>
