<?php

  // アクションフック"after_setup_theme"に関数を追加
  function takanashi_theme_setup() {
    add_theme_support('title-tag');            //titleタグを有効化
    add_theme_support('post-thumbnails');      //アイキャッチ画像を有効化
    add_theme_support('wp-block-styles');      //theme.min.cssの読み込み

    add_post_type_support('page', 'excerpt');  //固定ページの抜粋機能を有効化

    register_nav_menus([
      'header_menu' => 'ヘッダーメニュー',
      'footer_menu' => 'フッターメニュー',
    ]);
  }
  add_action('after_setup_theme', 'takanashi_theme_setup');



  // アクションフック"wp_enqueue_scripts"に関数を追加
  function my_enqueue_scripts() {
    wp_enqueue_style('ress_css', get_template_directory_uri(). '/assets/css/ress.css');
    wp_enqueue_style('dashicons');
    wp_enqueue_style('my_style', get_stylesheet_uri(), [], filemtime(get_theme_file_path('style.css')));
    wp_deregister_script( 'jquery' );
    wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
    wp_enqueue_script('throttle', get_template_directory_uri(). '/assets/js/jquery.ba-throttle-debounce.min.js');
    wp_enqueue_script(
      'my_js',
      get_template_directory_uri(). '/assets/js/main.js',
      [],
      filemtime(get_theme_file_path('/assets/js/main.js'))
    );
  }
  add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



  // ウィジェットの登録
  function theme_widgets_init() {
    register_sidebar([
      'name' => '投稿ページ用',
      'id' => 'post-aside',
      'description' => '投稿ページに表示する用のウィジェット',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
    ]);
  }
  add_action('widgets_init', 'theme_widgets_init');







  // ページタイトルを取得する
  function get_page_title() {
    if(is_home() || is_singular('post')):
      return 'ニュースリリース';
    elseif(is_category() || is_tax()):
      $queried_obj = get_queried_object();
      return $queried_obj->name;
    else:
      return get_the_title();
    endif;
  }

  // ヘッダー画像を取得する
  function get_header_img() {
    if(is_home() || is_category() || is_singular('post')):
      return get_the_post_thumbnail(81);
    elseif(is_tax() || is_singular('product_list')):
      return get_the_post_thumbnail(108);
    else:
      return get_the_post_thumbnail();
    endif;
  }

  // 商品画像のリストを取得する
  function get_product_imgs() {
    $image_ids = [];
    $product_imgs = get_field('product_imgs');
    for($num = 1; $num < 10; $num++) {
      $id = $product_imgs['product_img_'. $num];
      $image_ids[] = $id;
    }
    return $image_ids;
  }

  // 同タームの商品のデータを取得する
  function get_same_term_products() {
    $terms_obj = get_the_terms(get_the_ID(), 'product_cat');
    $args = [
      'posts_per_page' => 4,
      'post_type' => 'product_list',
      'orderby' => 'rand',
      'post__not_in' => [get_the_ID()],
      'tax_query' => [
        [
          'field' => 'slug',
          'taxonomy' => 'product_cat',
          'terms' => $terms_obj[0]->slug,
        ],
      ],
    ];
    return new WP_Query($args);
  }

  // 全商品のデータを取得する
  function get_all_products() {
    $args = [
      'posts_per_page' => 4,
      'post_type' => 'product_list',
      'orderby' => 'rand',
    ];
    return new WP_Query($args);
  }
