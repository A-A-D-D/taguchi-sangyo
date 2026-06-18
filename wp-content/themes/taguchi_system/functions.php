<?php
/*******************************************************
*
* SETS UP THEME DEFAULTS REGISTER SUPPORT WP FEATURES
*
*******************************************************/

if ( ! function_exists( 'aa_setup' ) ) :
    function aa_setup() {
        // Automatic feed links enables post and comment RSS feeds by default.
        add_theme_support( 'automatic-feed-links' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Allow users to format their posts in different ways. 
        add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        // Add support for two custom navigation menus.
        register_nav_menus( array(
            'primary'   => 'Primary Menu',
            'secondary' => 'Secondary Menu',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'aa_setup' );

/*******************************************************
*
* REGISTER WP WIDGETS
*
*******************************************************/
function aa_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Footer',
            'id'            => 'sidebar-1',
            'description'   => 'Add widgets here to appear in your footer.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'aa_theme_widgets_init' );

/*******************************************************
*
* ENQUEUE STYLES AND SCRIPTS
*
*******************************************************/
function theme_assets() {
    // Enqueue theme styles
    wp_enqueue_style('aos_styles', get_stylesheet_directory_uri() . '/css/aos.css');
    wp_enqueue_style('slick_styles', get_stylesheet_directory_uri() . '/css/slick.css');
    //wp_enqueue_style('iziModal_styles', get_stylesheet_directory_uri() . '/css/iziModal.min.css');
    wp_enqueue_style('fa_styles', get_stylesheet_directory_uri() . '/css/all.min.css');
    wp_enqueue_style('site_styles', get_stylesheet_directory_uri() . '/style.css', array(), date('YmdHi'));

    // Enqueue theme scripts
    wp_enqueue_script('jquery', get_stylesheet_directory_uri(). '/js/jquery-3.6.1.min.js');
    wp_enqueue_script('aos_scripts', get_stylesheet_directory_uri(). '/js/aos.js', array(), false, true);
    wp_enqueue_script('slick_scripts', get_stylesheet_directory_uri(). '/js/slick.min.js', array(), false, true);
    //wp_enqueue_script('iziModal_scripts', get_stylesheet_directory_uri(). '/js/iziModal.min.js', array(), false, true);
    wp_enqueue_script('site_scripts', get_stylesheet_directory_uri(). '/js/scripts.js', array(), date('YmdHi'), true);
}
add_action('wp_enqueue_scripts','theme_assets');

/*******************************************************
*
* メニューに[マニュアル]を追加
*
*******************************************************/
/* function artist_add_pages () {
    add_menu_page('更新マニュアル', '更新マニュアル', 'manage_options', 'manual', 'manual');
}
add_action ( 'admin_menu', 'artist_add_pages' ); */

/*******************************************************
*
* メニューのリンク先変更
*
*******************************************************/
/* function add_side_menu_manual() {
    $pdf_url = get_template_directory_uri() . '/pdf/manual.pdf';
    echo'
        <script type="text/javascript">
        jQuery( function( $ ) {
            $("#toplevel_page_manual a").attr("href","' . $pdf_url . '");
            $("#toplevel_page_manual a").attr("target","_blank");
        } );
        </script>
    ';
}
add_action('admin_footer', 'add_side_menu_manual'); */

/*******************************************************
*
* 管理画面のWordPressロゴを非表示にする
*
*******************************************************/
function hide_admin_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'hide_admin_logo' );

/*******************************************************
 *
 * 【投稿】の名称変更
 *
 *******************************************************/
/* function custom_post_labels( $labels ) {
  $labels->name = '新着情報'; // 投稿
  $labels->singular_name = '新着情報'; // 投稿
  $labels->add_new = '新規追加'; // 新規追加
  $labels->add_new_item = '新着情報を追加'; // 新規投稿を追加
  $labels->edit_item = '新着情報の編集'; // 投稿の編集
  $labels->new_item = '新規投稿'; // 新規投稿
  $labels->view_item = '新着情報を表示'; // 投稿を表示
  $labels->search_items = '新着情報を検索'; // 投稿を検索
  $labels->not_found = '投稿が見つかりませんでした。'; // 投稿が見つかりませんでした。
  $labels->not_found_in_trash = 'ゴミ箱内に投稿が見つかりませんでした。'; // ゴミ箱内に投稿が見つかりませんでした。
  $labels->parent_item_colon = ''; // (なし)
  $labels->all_items = '新着情報一覧'; // 投稿一覧
  $labels->archives = '新着情報アーカイブ'; // 投稿アーカイブ
  $labels->insert_into_item = '投稿に挿入'; // 投稿に挿入
  $labels->uploaded_to_this_item = 'この投稿へのアップロード'; // この投稿へのアップロード
  $labels->featured_image = 'アイキャッチ画像'; // アイキャッチ画像
  $labels->set_featured_image = 'アイキャッチ画像を設定'; // アイキャッチ画像を設定
  $labels->remove_featured_image = 'アイキャッチ画像を削除'; // アイキャッチ画像を削除
  $labels->use_featured_image = 'アイキャッチ画像として使用'; // アイキャッチ画像として使用
  $labels->filter_items_list = '新着情報リストの絞り込み'; // 投稿リストの絞り込み
  $labels->items_list_navigation = '新着情報リストナビゲーション'; // 投稿リストナビゲーション
  $labels->items_list = '新着情報リスト'; // 投稿リスト
  $labels->menu_name = '新着情報'; // 投稿
  $labels->name_admin_bar = '新着情報'; // 投稿
  return $labels;
}
add_filter( 'post_type_labels_post', 'custom_post_labels' ); */

/*******************************************************
*
* 投稿記事のスラッグが日本語などマルチバイトの場合は、{投稿タイプ}-{記事ID}に強制的に変更
*
*******************************************************/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

/*******************************************************
*
* SHORTCODES
*
*******************************************************/
function siteurl(){
    return get_site_url();
}
add_shortcode('url', 'siteurl');

function get_directory() {
    return get_bloginfo('stylesheet_directory');
}
add_shortcode('stylesheet_directory', 'get_directory');

/*******************************************************
*
* REMOVE AUTO PARAGRAPH IN WP EDITOR
*
*******************************************************/
function remove_empty_tags_recursive ($str, $repto = NULL) {
    $str = force_balance_tags($str);
    //** Return if string not given or empty.
    if (!is_string ($str)|| trim ($str) == '')
        return $str;
    //** Recursive empty HTML tags.
     return preg_replace (
        //** Pattern written by Junaid Atari.
        '/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU',
        //** Replace with nothing if string empty.
        !is_string ($repto) ? '' : $repto,
        //** Source string
        $str
    );
}
add_filter('the_content', 'remove_empty_tags_recursive', 20, 1);

/*******************************************************
*
* PAGINATION (NUMBERED)
*
*******************************************************/
function pagination_bar( $query, $posts_per_page, $current_page = 1, $offset = 0 ) {
    $pagination = '';
    $total_posts = $query->found_posts - $offset;
    $total_pages = ceil( $total_posts / $posts_per_page );
    $big = 999999999; // need an unlikely integer

    $use_first_last = FALSE; // Set to TRUE to use first/last page navigation

    if( $total_pages > 1 ){

        if( $use_first_last && ( $total_pages > 2 && $current_page > 2 ) ) {
            $pagination .= '<a class="first page-numbers" href="' . esc_url( get_pagenum_link( 1 ) ) . '">«</a>';
        }

        $pagination .= paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            // 'prev_next' => false,
            'prev_text' => '<',
            'next_text' => '>',
        ) );

        if( $use_first_last && ( $total_pages > 2 && $current_page < $total_pages - 1 ) ) {
            $pagination .= '<a class="last page-numbers" href="' . esc_url( get_pagenum_link( $total_pages ) ) . '">»</a>';
        }

    }

    return $pagination;
}

/*******************************************************
*
* MW_WP_Form 初期フォーム
*
*******************************************************/
class MPS_MW_WP_Form_Config{
    /* ------------------------------------------------ 
        フック指定
    ------------------------------------------------ */
    public function __construct() {
        add_filter( 'mwform_default_title',    array( $this, 'my_default_title' ), 10, 3 );
        add_filter( 'mwform_default_content',  array( $this, 'my_default_content' ), 10, 3 );
        add_filter( 'mwform_default_settings', array( $this, 'my_default_settings' ), 10, 3 );
    }
    /* ------------------------------------------------ 
        初期値指定
    ------------------------------------------------ */
    //フォームタイトルの初期値を設定
    public function my_default_title( $title ){
        $title = 'お問い合わせフォーム';
        return $title;
    }
    //フォーム本文の初期値を設定
    public function my_default_content( $content ){
        $content = '
            <div class="contents-block form-block">
                <div class="txt-form">
                    <p class="txt-form-entry">ご相談及びお見積り等は下記のフォームにご入力の上、ご送信下さい。</p>
                    <p class="txt-form-conf">入力内容をご確認の上、「送信する」ボタンを押してください。</p>
                </div>
                <table class="table-type04">
                    <tr>
                        <th>貴社名 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-company"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>部署名 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-position"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>お名前 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-name"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>郵便番号 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-postal"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>ご住所 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-address"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号 <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-phone"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス <span class="red">必須</span></th>
                        <td>
                            <div class="input-text">[mwform_text name="your-mail"]</div>
                        </td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容 <span class="red">必須</span></th>
                        <td>
                            <div class="input-textarea">[mwform_textarea name="your-comment" cols="50" rows="5"]</div>
                        </td>
                    </tr>
                </table>
                <div class="input-submit">
                    <div class="caution-privacy">
                        <p class="txt">個人情報保護方針をお読みください(同意必須)　<a href="[getHome]privacy/">個人情報保護方針</a></p>
                        <div class="input-check fz16">[mwform_checkbox name="your-check" children="個人情報保護方針に同意する"]</div>
                    </div>
                    <span class="back">[mwform_backButton value="修正する"]</span><span class="enter">[mwform_submitButton name="submit" confirm_value="確認する" submit_value="送信する"]</span></div>
            </div>
        ';
        return $content;
    }
    //フォーム設定項目の初期値を設定
    public function my_default_settings( $option, $key ){
        switch( $key ) {
            /* ---- 完了画面メッセージ ---- */
            case 'complete_message':
                $option = '<div class="contents-block form-block">
                    <div class="txt-form">
                        <p>お問い合わせを受け付けました。<br>返信までしばらくお待ち下さい。</p>
                    </div>
                </div>';
                break;
            /* ---- URL設定 ---- */
            case 'input_url':
                $option = '/contact'; //入力画面URL
                break;
            case 'confirmation_url':
                $option = ''; //確認画面URL
                break;
            case 'complete_url':
                $option = ''; //完了画面URL
                break;
            case 'validation_error_url':
                $option = ''; //エラー画面URL
                break;
            /* ---- お客様向け 自動返信メール設定 ---- */
            case 'mail_subject' :
                $option = 'お問い合わせありがとうございます'; //件名
                break;
            case 'mail_content' :
                $option = "この度はお問い合わせいただきありがとうございます。
                下記内容にてお問い合わせを受け付けました。

                ◎ 貴社名
                {your-company}

                ◎ 部署名
                {your-position}

                ◎ お名前
                {your-name}

                ◎ 郵便番号
                {your-postal}

                ◎ ご住所
                {your-address}

                ◎ 電話番号
                {your-phone}

                ◎ メールアドレス
                {your-mail}

                ◎ お問い合わせ内容
                {your-comment}

                ------------------------------

                ＊＊＊＊＊へお問い合わせありがとうございます。
                担当の者より、折り返し御連絡させて頂きます。

                ※このメールは自動返信メールです。
                このメールに返信いただいても、返信内容の確認およびご返答ができません。あらかじめご了承ください。";
                break;
            case 'automatic_reply_email' :
                $option = 'your-mail'; //自動返信メールのキー名
                break;
            /* ---- 管理者向けメール設定 ---- */
            case 'admin_mail_sender' :
                $option = '{your-name}'; //送信者名
                break;
            case 'admin_mail_from' :
                $option = '{your-mail}'; //送信元アドレス
                break;
            case 'admin_mail_subject' :
                $option = 'Webサイトからお問い合わせがありました'; //件名
                break;
            case 'admin_mail_content' :
                $option = "入力された内容は以下のとおりです。

                ◎ 貴社名
                {your-company}

                ◎ 部署名
                {your-position}

                ◎ お名前
                {your-name}

                ◎ 郵便番号
                {your-postal}

                ◎ ご住所
                {your-address}

                ◎ 電話番号
                {your-phone}

                ◎ メールアドレス
                {your-mail}

                ◎ お問い合わせ内容
                {your-comment}

                ------------------------------

                このメールは＊＊＊＊＊のお問い合わせフォームから送信されました。
                {your-name}様へ御連絡してください。";
                break;
            /* ---- バリデーション設定項目 ---- */
            case 'validation' :
                $option = array(
                    array(
                        'target'  => 'your-mail',
                        'noempty' => true,
                        'mail'    => true,
                    ),
                    array(
                        'target'  => 'your-check',
                        'required'    => true,
                    ),
                    array(
                        'target'  => 'your-comment',
                        'noempty' => true,
                    ),
                    array(
                        'target'  => 'your-phone',
                        'noempty' => true,
                        'tel'    => true,
                    ),
                    array(
                        'target'  => 'your-name',
                        'noempty'    => true,
                    ),
                    array(
                        'target'  => 'your-address',
                        'noempty' => true,
                    ),
                    array(
                        'target'  => 'your-postal',
                        'noempty' => true,
                    ),
                    array(
                        'target'  => 'your-position',
                        'noempty' => true,
                    ),
                    array(
                        'target'  => 'your-company',
                        'noempty' => true,
                    ),
                );
                break;
        }
        return $option;
    }
}
new MPS_MW_WP_Form_Config();

/*******************************************************
*
* ADD BROWSER CLASS
*
*******************************************************/
function mv_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        $classes[] = 'ie';
        if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
        $classes[] = 'ie'.$browser_version[1];
    } else $classes[] = 'unknown';

    if($is_iphone) $classes[] = 'iphone';

    if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'mac') ) {
        $classes[] = 'osx';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], 'linux') ) {
        $classes[] = 'linux';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'], 'windows') ) {
        $classes[] = 'windows';
    }
    
    return $classes;
}
add_filter('body_class','mv_browser_body_class');

/*******************************************************
*
* create sample post for WYSIWYG Check
*
*******************************************************/
function create_post_sample(){
  $awesome_page_id_0 = get_option('awesome_page_id_0');
  if (!$awesome_page_id_0) {
      //create a new page and automatically assign the page template
      $post = array(
          'post_title' => '投稿のテスト',
          'post_name' => 'sample_post',
          'post_content' => '<h1>h1 heading</h1>
          <h2>h2 heading</h2>
          <h3>h3 heading</h3>
          <h4>h4 heading</h4>
          <h5>h5 heading</h5>
          <h6>h6 heading</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <hr />
          <p>18:51:44</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <del>tempor</del> <span style="text-decoration: underline;">incididunt</span> ut <em>labore</em> et dolore <strong>magna aliqua</strong>.</p>
          <hr />
          <blockquote>
              <p>test test test test</p>
              <p>test test test</p>
          </blockquote>
          <p><a href="#">text link style</a></p>
          <p style="text-align: center;">text align center</p>
          <p style="text-align: right;">text align right</p>
          <p><span style="color: #ff0000;">color red text</span></p>
          <p><strong>strong text</strong></p>
          <p><i>italic text</i></p>
          <p>H<sup>2</sup></p>
          <p>CO<sub>2</sub></p>
          <p><span style="text-decoration: underline;">under border text</span></p>
          <p><del>delete text</del></p>
          <ul>
              <li>list</li>
              <li>list</li>
              <li><a href="#">list link</a></li>
          </ul>
          <ol>
              <li>ordered list</li>
              <li>ordered list</li>
              <li><a href="#">ordered list link</a></li>
          </ol>
          <table>
              <tbody>
                  <tr>
                      <th>item name</th>
                      <td>item text</td>
                  </tr>
                  <tr>
                      <th>item name</th>
                      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                  </tr>
                  <tr>
                      <th>item name</th>
                      <td><a href="#">item text</a></td>
                  </tr>
              </tbody>
          </table>
          <p><img class="alignleft" src="//dummyimage.com/320x200/ababab/ffffff.jpg" /></p>
          <p><img class="aligncenter" src="//dummyimage.com/320x200/ababab/ffffff.jpg" /></p>
          <p><img class="alignright" src="//dummyimage.com/320x200/ababab/ffffff.jpg" /></p>
          <p><img class="alignnone" src="//dummyimage.com/1200x600/ababab/ffffff.jpg" /></p>
          <p><img src="//dummyimage.com/320x200/ababab/ffffff.jpg" alt="" /> <img src="//dummyimage.com/1200x600/ababab/ffffff.jpg" alt="" /></p>',
          'post_status' => 'publish',
          'post_type' => 'post',
      );
      $postID = wp_insert_post($post);
      update_option("awesome_page_id_0", $postID);
  }
}
add_action('after_setup_theme', 'create_post_sample');

/*******************************************************
*
* REMOVE VALIDATOR ERROR 
*
*******************************************************/
// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

/*******************************************************
*
* Add class to menu links
*
*******************************************************/
function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    } else {
        $atts['class'] = 'menu-item-link block';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

/*******************************************************
*
* Add description to menu
*
*******************************************************/
function add_menu_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $item->title . '</a>', '<span class="menu-item-description">' . $item->description . '</span><span class="menu-item-title">' . $item->title . '</span></a>', $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'add_menu_description', 10, 4 );

/*******************************************************
*
* ADD CUSTOM COLUMNS TO "PAGE" POST LIST
*
*******************************************************/
function add_page_posts_columns ( $columns ) {
    return array_slice ( $columns, 0, 2, true ) + array ( 
        'slug' => __ ( get_locale() == 'ja' ? 'スラッグ' : 'Slug' )
    ) + array_slice ( $columns, 2, null, true );
}
add_filter ( 'manage_page_posts_columns', 'add_page_posts_columns' );

/*******************************************************
*
* GET "PAGE" POST CUSTOM COLUMNS
*
*******************************************************/
function page_posts_custom_column ( $column, $post_id ) {
    switch ( $column ) {
        case 'slug':
            echo str_replace( site_url() . '/', '', get_permalink( $post_id ) );
            break;
    }
}
add_action ( 'manage_page_posts_custom_column', 'page_posts_custom_column', 10, 2 );

/*******************************************************
*
* DISPLAY RESPONSIVE IMAGES
*
*******************************************************/
function shortcode_responsive_img ( $atts ) {
    $a = shortcode_atts( array(
        'wrapper_class' => '',
        'image_class' => 'block',
        'file' => '',
        'ext' => '',
        'width' => 0,
        'height' => 0,
        'alt' => '',
        'retina' => TRUE,
    ), $atts );

    $file = get_stylesheet_directory_uri() . '/assets/images/' . $a['file'] . '.' . $a['ext'];
    $file_ret = get_stylesheet_directory_uri() . '/assets/images/' . $a['file'] . '@2x.' . $a['ext'];

    return '
        <canvas class="' . $a['wrapper_class'] . '" width="' . $a['width'] . '" height="' . $a['height'] . '"></canvas>
        <img class="' . $a['image_class'] . '" src="' . $file . '"' . ($a['retina'] ? ' srcset="' . $file_ret . ' 2x"' : '') . ' alt="' . $a['alt'] . '">
    ';
}
add_shortcode('custom_image', 'shortcode_responsive_img');

/*******************************************************
*
* 本文内のURLを削除
*
*******************************************************/
function delete_url_content($content) {
    define('URL_REG_STR', '(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)');
    define('URL_REG', '/'.URL_REG_STR.'/');
    $content = preg_replace(URL_REG, '', $content);
    return $content;
}

/*******************************************************
*
* imgタグRetina用src出力
*
*******************************************************/
function image_src_retina($path, $file, $file_retina) {
    if($path == '' || $file == '') {
        return;
    }

    return 'src="' . $path . '/' . $file . '" srcset="' . $path . '/' . $file . ' 1x, ' . $path . '/' . $file_retina . ' 2x"';
}

/*******************************************************
*
* 投稿アーカイブページ有効化
*
*******************************************************/
/* function post_has_archive($args, $post_type) {
    if('post'== $post_type){
      $args['rewrite']=true;
      $args ['label'] = 'お知らせ';     //「投稿」のラベル名
      $args['has_archive']='news';     // アーカイブにつけるスラッグ名
    }
    return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2); */

/*******************************************************
*
* メールフォーム日付タグ
*
*******************************************************/
function contact_date($value, $key, $insert_contact_data_id) {
    if($key === 'contact_date') {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Tokyo'));
        return $date->format('Ymd');
    }
    return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-281', 'contact_date', 10, 3 );

/*******************************************************
*
* メディアアップロード時リサイズ機能停止
*
*******************************************************/
//add_filter( 'big_image_size_threshold', '__return_false' );

/*******************************************************
 *
 * TinyMCE 自動整形オフ
 *
 *******************************************************/
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function my_format_TinyMCE($in) {
    global $allowedposttags;

	$in['valid_elements'] = '*[*]';
    $in['extended_valid_elements'] = '*[*]';
    $in['valid_children'] = '+a[' . implode('|', array_keys($allowedposttags)) . ']';
    $in['indent'] = true;
    $in['wpautop'] = false;
    $in['forced_root_block'] = false;
    return $in;
}
add_filter('tiny_mce_before_init', 'my_format_TinyMCE');

/*******************************************************
*
* Ajax: "VOICE" CUSTOM POST LIST
*
*******************************************************/
function get_voice_posts() {
    $base = $_POST['base'];
    $posts_per_page = isset($_POST['postsPerPage']) ? $_POST['postsPerPage'] : 3;
    $current_page = isset($_POST['pageNumber']) ? $_POST['pageNumber'] : 1;

    // overwrite base URL
    $orig_req_uri = $_SERVER['REQUEST_URI'];
    $_SERVER['REQUEST_URI'] = $base;

    $args = array(
        'post_type' => 'voice',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'order' => 'DESC',
        'paged' => $current_page,
    );
    $the_query = new WP_Query( $args );

    if($current_page == 1) {
        $first_page = 'first-page';
    }
    if($current_page == $the_query->max_num_pages) {
        $last_page = 'last-page';
    }

    if ( $the_query->have_posts() ) {
        $html .= '<ul class="list ' . $first_page . $last_page . '" data-page="' . $current_page . '">';

        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $content = apply_filters('the_content',get_the_content());
            $html .= '<li class="item">' . $content . '</li>';
        }
        $html .= '</ul>';
    }
    wp_reset_postdata();

    if($base) {
        $_SERVER['REQUEST_URI'] = $orig_req_uri;
        echo $html;
        exit;
    } else {
        return $html;
    }
}
/* add_shortcode('voice_post_list', 'get_voice_posts');
add_action('wp_ajax_get_voice_posts', 'get_voice_posts');
add_action('wp_ajax_nopriv_get_voice_posts', 'get_voice_posts'); */

/*******************************************************
*
* the_archive_title 余計な文字を削除
*
*******************************************************/
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
        $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
        $title = get_the_time('Y年n月');
	} elseif (is_search()) {
        $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
        $title = '「404」ページが見つかりません';
	} else {
	}
    return $title;
});

/*******************************************************
*
* WP-Members
*
*******************************************************/
//フォーム設定
function my_wpmem_login_form_args($args, $action) {
    if($action == 'login') { //ログイン
        $args['remember_check'] = false;
    }
}
add_filter('wpmem_login_form_args', 'my_wpmem_login_form_args', 10, 2);

//会員登録後にサンクスページに自動転送をかける
function the_regist_complete_redirect_thanks_page( $fields ) {
    wp_redirect(home_url() . '/registration-thanks');
	exit();
}
add_action( 'wpmem_register_redirect', 'the_regist_complete_redirect_thanks_page' );

/*******************************************************
*
* Woocommerce
*
*******************************************************/
function woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'woocommerce_support');


//商品詳細ページのカート追加ボタンのテキスト変更
function woocommerce_custom_single_add_to_cart_text() {
    return __( '商品を追加する', 'woocommerce' ); 
}
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

//商品一覧ページのカート追加ボタンのテキスト変更
function woocommerce_custom_product_add_to_cart_text() {
    return __( '商品を追加する', 'woocommerce' ); 
}
//add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  

function my_gettext_graphy( $translated, $text, $domain ) {
	if('woocommerce' === $domain || 'woocommerce-for-japan' === $domain) {
		$texts = array(
			//'Billing details' => 'お客様情報',
            'Add to cart' => '商品を追加する',
            //'Billing %s' => 'お客様情報の %s',
            //'Billing address' => 'お客様住所',
		);
		if(isset( $texts[$text])) {
			$translated = $texts[$text];
		}
	}
	return $translated;
}
add_filter( 'gettext', 'my_gettext_graphy', 10, 3 );

/*******************************************************
*
* SHORTCODE : GET EMAIL
*
*******************************************************/
function get_email() {
    $user = wp_get_current_user();
    return $user->user_email;
}
add_shortcode('get_email', 'get_email');
wpcf7_add_shortcode('get_email', 'get_email');

/*******************************************************
*
* Contact Form 7
*
*******************************************************/
//確認用メールアドレス バリデーション
function wpcf7_custom_email_validation_filter( $result, $tag ) {
    if ( 'email-confirm' == $tag->name ) {
        $email = isset( $_POST['email'] ) ? trim( $_POST['email'] ) : '';
        $email_confirm = isset( $_POST['email-confirm'] ) ? trim( $_POST['email-confirm'] ) : '';
        if ( $email != $email_confirm ) {
            $result->invalidate( $tag, "メールアドレスが一致しません" );
        }
    }
    return $result;
}
add_filter( 'wpcf7_validate_email', 'wpcf7_custom_email_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_custom_email_validation_filter', 20, 2 );

//メール送信前処理
function my_action_wpcf7_before_send_mail( $contact_form, &$abort, $mailobj ) { 
    $form_id = $contact_form->id();

    //manager-edit_form(84)
    if($form_id == 84) {
        //$user_id = get_current_user_id();
        $submission = WPCF7_Submission::get_instance(); 
        $posted_data = $submission->get_posted_data();
        $user_id = $posted_data['current_user_id'];
        $email = $posted_data['email'];
        if($user_id == 2) {
            wp_update_user([
                'ID' => $user_id,
                'user_email' => $email,
            ]);
        }
        //$abort = true;
    }

    //site-add_form(138)
    if($form_id == 138) {
        //$user_id = get_current_user_id();
        $submission = WPCF7_Submission::get_instance(); 
        $posted_data = $submission->get_posted_data();

        $site_name = $posted_data['site_name'];
        $postcode = $posted_data['postcode'];
        $address_1 = $posted_data['address_1'];
        $address_2 = $posted_data['address_2'];
        $contact_1 = $posted_data['contact_1'];
        $contact_2 = $posted_data['contact_2'];
        $contact_3 = $posted_data['contact_3'];
        $vehicle_restrictions = ($posted_data['vehicle_restrictions'][0] === 'true') ? true : false;
        $restriction_type = $posted_data['restriction_type'];
        $other_text = $posted_data['other_text'];
        $user_id = $posted_data['current_user_id'];

        $new_post_data = array(
            'post_title'    => $site_name,
            'post_status'   => 'publish',
            'post_type'     => 'site_post',
        );
        $post_id = wp_insert_post( $new_post_data );

        if ( ! is_wp_error( $post_id ) ) {
            update_field( 'site_name', $site_name, $post_id );
            update_field( 'postcode', $postcode, $post_id );
            update_field( 'address_1', $address_1, $post_id );
            update_field( 'address_2', $address_2, $post_id );
            update_field( 'contact_1', $contact_1, $post_id );
            update_field( 'contact_2', $contact_2, $post_id );
            update_field( 'contact_3', $contact_3, $post_id );
            update_field( 'vehicle_restrictions', $vehicle_restrictions, $post_id );
            update_field( 'restriction_type', $restriction_type, $post_id );
            update_field( 'other_text', $other_text, $post_id );
            update_field( 'user', $user_id, $post_id );
        }
    }
}
add_action( 'wpcf7_before_send_mail', 'my_action_wpcf7_before_send_mail', 10, 3 );

//メール送信をスキップ
add_filter( 'wpcf7_skip_mail', function( $skip, $contact_form ) {
    if ( $contact_form->id() === 84 || $contact_form->id() === 138 ) {
        return true;
    }
    return $skip;
}, 10, 2 );

// [current_user_id] というタグを使えるようにする
add_filter('wpcf7_special_mail_tags', function( $output, $name ) {
    if ( $name == 'current_user_id' ) {
        return get_current_user_id();
    }
    return $output;
}, 10, 2);

// フォーム内で hidden フィールドの default 値としても使えるようにする
add_filter('wpcf7_form_tag', function( $tag ) {
    if ( $tag['name'] === 'current_user_id' && $tag['type'] === 'hidden' ) {
        $tag['values'] = [ get_current_user_id() ];
    }
    return $tag;
});

// select項目をカスタム投稿から取得
/* add_filter( 'wpcf7_form_tag_select', 'site_select_options', 10, 2 );
function site_select_options( $tag, $unused ) {
    if ( $tag->name !== 'site_select' ) {
        return $tag;
    }

    $user = wp_get_current_user();
    $tag->values = array(); // 初期化

    // 先頭に「選択してください」を追加（空の値にする）
    $tag->values[] = '選択してください|';

    // カスタム投稿「site_post」から投稿タイトルを取得して追加
    $posts = get_posts( array(
        'post_type'      => 'site_post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query' => array(
            array(
                'key' => 'user',
                'value' => $user->ID,
                'compare' => '=',
            )
        ),
    ) );

    foreach ( $posts as $post ) {
        $tag->values[] = esc_html( $post->post_title ) . '|' . esc_attr( $post->ID );
    }

    return $tag;
} */



add_action( 'wpcf7_init', 'custom_add_dynamic_select_tag' );

function custom_add_dynamic_select_tag() {
    wpcf7_add_form_tag( 'dynamic_select', 'custom_dynamic_select_handler', array( 'name-attr' => true ) );
}

function custom_dynamic_select_handler( $tag ) {
    $tag = new WPCF7_FormTag( $tag );

    $name = $tag->name;
    $user = wp_get_current_user();

    $posts = get_posts( array(
        'post_type'      => 'site_post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'user',
                'value' => $user->ID,
                'compare' => '=',
            )
        ),
    ) );

    $html = '<select name="' . $name . '" id="' . $name . '" class="wpcf7-form-control wpcf7-select"' . '" required>';

    $html .= '<option value="" disabled selected>選択して下さい</option>';
    foreach ( $posts as $post ) {
        $title = esc_html( get_the_title( $post->ID ) );
        $html .= '<option value="' . $post->ID . '">' . $title . '</option>';
    }

    $html .= '</select>';

    return $html;
}

/*******************************************************
*
* 現場削除
*
*******************************************************/
add_action('admin_post_delete_site_post', 'delete_site_post');
function delete_site_post() {
    // 入力チェック
    if (
        !isset($_POST['post_id'], $_POST['_wpnonce']) ||
        !wp_verify_nonce($_POST['_wpnonce'], 'delete_site_post_' . $_POST['post_id'])
    ) {
        wp_die('不正なリクエストです。');
    }

    $post_id = intval($_POST['post_id']);

    // 投稿の所有者確認
    if (get_current_user_id() !== (int) get_field('user', $post_id)) {
        wp_die('この投稿を削除する権限がありません。');
    }

    // 投稿をゴミ箱へ移動（完全削除なら第2引数を true に）
    wp_trash_post($post_id);

    // 完了後にリダイレクト
    wp_redirect(home_url('site/')); // TOPページなどに変更可
    exit;
}

/*******************************************************
*
* 都道府県コードから都道府県名を取得
*
*******************************************************/
function get_pref_name($pref_code) {
    $pref_list = array(
        'JP01' => '北海道',
        'JP02' => '青森県',
        'JP03' => '岩手県',
        'JP04' => '宮城県',
        'JP05' => '秋田県',
        'JP06' => '山形県',
        'JP07' => '福島県',
        'JP08' => '茨城県',
        'JP09' => '栃木県',
        'JP10' => '群馬県',
        'JP11' => '埼玉県',
        'JP12' => '千葉県',
        'JP13' => '東京都',
        'JP14' => '神奈川県',
        'JP15' => '新潟県',
        'JP16' => '富山県',
        'JP17' => '石川県',
        'JP18' => '福井県',
        'JP19' => '山梨県',
        'JP20' => '長野県',
        'JP21' => '岐阜県',
        'JP22' => '静岡県',
        'JP23' => '愛知県',
        'JP24' => '三重県',
        'JP25' => '滋賀県',
        'JP26' => '京都府',
        'JP27' => '大阪府',
        'JP28' => '兵庫県',
        'JP29' => '奈良県',
        'JP30' => '和歌山県',
        'JP31' => '鳥取県',
        'JP32' => '島根県',
        'JP33' => '岡山県',
        'JP34' => '広島県',
        'JP35' => '山口県',
        'JP36' => '徳島県',
        'JP37' => '香川県',
        'JP38' => '愛媛県',
        'JP39' => '高知県',
        'JP40' => '福岡県',
        'JP41' => '佐賀県',
        'JP42' => '長崎県',
        'JP43' => '熊本県',
        'JP44' => '大分県',
        'JP45' => '宮崎県',
        'JP46' => '鹿児島県',
        'JP47' => '沖縄県',
    );
    return $pref_list[$pref_code];
}

/*******************************************************
*
* ユーザーごとの閲覧制限
*
*******************************************************/
function manager_only_page() {
    if(!is_user_logged_in() || (!current_user_can('administrator') && !current_user_can('shop_manager'))) {
        wp_redirect(home_url());
        exit;
    }
}

function restrict_access() {
    $allowed_slugs = [];
    $redirect_page = '/login/';
    if(is_user_logged_in()) {
    //ログイン済み
        if(current_user_can('shop_manager')) {
        //ショップ運営者
            $allowed_slugs = [
                'manager',
                'manager-edit',
                'regular-order-list',
                'company',
                'privacy-policy',
                'law',
            ];
            $redirect_page = '/manager/';
        } else if(current_user_can('subscriber')) {
        //購読者
            $allowed_slugs = [
                'products',
                'cart',
                'checkout',
                'profile',
                'profile-edit',
                'site',
                'site-add',
                'company',
                'privacy-policy',
                'law',
                'purchase-order',
            ];
            $redirect_page = '/';
        }
    } else {
    //未ログイン
        $allowed_slugs = [
            'login',
            'registration',
            'registration-thanks',
            'company',
            'privacy-policy',
            'law',
        ];
        $redirect_page = '/login/';
    }

    if(is_front_page() || is_home()) {
        if(current_user_can('shop_manager')) {
            wp_safe_redirect(home_url($redirect_page));
            exit;
        }
    } else if(is_singular('product')) {
        if(!current_user_can('subscriber')) {
            wp_safe_redirect(home_url($redirect_page));
            exit;
        }
    } else {
        $obj = get_queried_object();
        $current_slug = isset($obj->post_name) ? $obj->post_name : (isset($obj->slug) ? $obj->slug : '');
        if(!in_array($current_slug, $allowed_slugs)) {
            wp_safe_redirect(home_url($redirect_page));
            exit;
        }
    }
}
add_action('template_redirect', 'restrict_access');

/*******************************************************
*
* WP-Membersフィールドのラベル取得
*
*******************************************************/
function get_wpmem_label_from_value( $field_name, $user_value ) {
    $fields = wpmem_fields();
    $options = $fields[$field_name]['values'];
    foreach($options as $option) {
        if ( strpos( $option, '|' ) !== false ) {
            list( $label, $value ) = array_map( 'trim', explode( '|', $option ) );
        } else {
            // ラベルとvalueが同一の場合
            $label = $value = trim( $option );
        }
        if ( $value === $user_value ) {
            return $label;
        }
    }
    return null;
}

/*******************************************************
*
* 必須ではないフィールド取得
*
*******************************************************/
function get_not_required_field($user_id, $field_name) {
    if(!($result = get_user_meta($user_id, $field_name, true))) {
        $result = '未登録';
    }
    return $result;
}

/*******************************************************
*
* Ajax : 現場住所の取得
*
*******************************************************/
function get_site_address() {
    $post_id = intval($_POST['post_id']);
    $postcode = get_field('postcode', $post_id);
    $address_1 = get_field('address_1', $post_id);
    $address_2 = get_field('address_2', $post_id);

    if ($postcode) {
        echo '〒'.$postcode.' '.$address_1.$address_2;
    } else {
        echo '現場情報が見つかりませんでした' . $post_id;
    }
    wp_die(); // Ajax終了
}
add_action('wp_ajax_get_site_address', 'get_site_address');
add_action('wp_ajax_nopriv_get_site_address', 'get_site_address');


?>