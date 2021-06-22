<?php if(!is_front_page()): ?>
    </div><!-- .wrapper -->
  </div><!-- .page-main -->
<?php endif; ?>
<footer>
  <div class="wrapper">
    <div class="footer-flex">
      <div class="footer-info">
        <h1><a class="logo-link" href="<?php echo home_url(); ?>">小鳥遊家具</a></h1>
        <p class="footer-disclaimer">
          当サイトはWebデザイナーT.sanoがポートフォリオとして作成した、架空の企業「小鳥遊家具」のHPです。
          記載されている個人及び企業の情報は、実在する人物および団体と一切関係ありません。
        </p>
      </div>
      <ul class="sns-icons">
        <li class="twitter"><a href="#"></a></li>
        <li class="facebook"><a href="#"></a></li>
        <li class="instagram"><a href="#"></a></li>
      </ul>
    </div>
    <nav class="footer-nav">
      <?php
      if(has_nav_menu('footer_menu')):
        wp_nav_menu([
          'theme_location' => 'footer_menu',
          'container' => false,
        ]);
      endif; ?>
    </nav>
    <p class="copyright">&copy; 2021 小鳥遊家具</p>
  </div>
</footer>
<div id="smooth-scr" class="">
</div>
<div class="hamb-blind">
</div>
<?php wp_footer(); ?>
</body>
</html>
