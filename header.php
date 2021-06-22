<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php if(is_front_page()): ?>
      <meta name="description" content="住まいに豊かなひとときを。
      小鳥遊家具は、職人の洗練された技術と真心で、お客様のおうち時間を豊かに彩ります。">
    <?php endif; ?>
    <!-- title        設定済み -->
    <!-- description  設定済み(トップページのみ) -->
    <!-- favicon      設定済み -->
    <!-- OGP -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
      <div class="wrapper header-wrapper">
        <h1><a class="logo-link" href="<?php echo home_url(); ?>">小鳥遊家具</a></h1>
        <nav class="header-nav">
          <!-- ヘッダーメニュー（ＰＣ用） -->
          <?php
            if(has_nav_menu('header_menu')):
              wp_nav_menu([
                'theme_location' => 'header_menu',
                'container' => false,
              ]);
            endif; ?>
        </nav>
        <!-- ハンバーガーメニュー -->
        <div class="hamb-btn">
          <div class="hamb-top"></div>
          <div class="hamb-middle"></div>
          <div class="hamb-bottom"></div>
        </div>
        <nav class="hamb-list">
          <?php
            if(has_nav_menu('header_menu')):
              wp_nav_menu([
                'theme_location' => 'header_menu',
                'container' => false,
              ]);
            endif; ?>
        </nav>
      </div>
    </header>
    <?php if(is_front_page()): ?>
      <div class="slideshow">
        <div class="slides">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-img-1.jpg" alt="スライド１">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-img-2.jpg" alt="スライド２">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-img-3.jpg" alt="スライド３">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-img-4.jpg" alt="スライド４">
        </div>
        <div class="round-btn">
          <span class="active"></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    <?php else: ?>
      <div class="header-img">
        <?php $header_img = get_header_img();
              echo $header_img; ?>
        <h2 class="page-title">
          <?php echo get_page_title(); ?>
        </h2>
      </div>
      <div class="wrapper">
        <?php if(function_exists('bread_crumb')):
          bread_crumb();
        endif; ?>
      </div>
      <div class="page-main">
        <div class="wrapper">
    <?php endif; ?>
