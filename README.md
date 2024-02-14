# Generatepress Child
Creating Child Themes with Stylistic Features for GeneratePress.

## Child Theme Blank Template
Note：Development Convention: Consistent Use of Hyphen (-) for Naming
> [Download 0.1.0](https://github.com/roambiz/generatepress-child/releases/tag/0.1.0)

## 扩展包列表

#### 组件
- Disabler
- Facade
#### 模块
- cust-css-preloading

<!-- ---------- ---------- 我是分割线 ---------- ---------- -->

### How To Use Child Theme Extensions

// === Disabler === //
>说明：
>需要使用时，安装[ Code Snippets ]插件，新建两个片段，分别放入下列代码，方便开启关闭。
```
// Disable Page Select
function add_page_right_select_js_inline_script() {
	echo '<script defer src="
		' . get_stylesheet_directory_uri() . '/extensions/components/disabler/disable-page-select.js
	"></script>';
}
add_action( 'wp_footer', 'add_page_right_select_js_inline_script', 999  );

// Disable Right Click
function add_disable_right_click_js_inline_script() {
	echo '<script defer src="
		' . get_stylesheet_directory_uri() . '/extensions/components/disabler/disable-right-click.js
	"></script>';
}
add_action( 'wp_footer', 'add_disable_right_click_js_inline_script', 999  );
```

// === Facade === //
>说明：
>需要使用时，直接在[ functions.php ] 文件内extensions注释条下行粘贴下列相应代码。
```
wp_enqueue_style(  
	'lite-yt-embed', 
	get_stylesheet_directory_uri() . '/extensions/components/facade/lite-yt-embed.css', 
	array(), 
	'1.0.0', 
	'print' 
);

wp_enqueue_script(
	 'lite-yt-embed', 
	get_stylesheet_directory_uri() . '/extensions/components/facade/lite-yt-embed.js', 
	array(), 
	'1.0.0', 
	array(
		'strategy' => 'async',
        'in_footer' => true   
	) 
);
```

## 你可能需要的一些代码片段
```
<?php
// 删除默认的 readme.html 文件
if (is_file(ABSPATH . 'readme.html')) {
    unlink(ABSPATH . 'readme.html');
}

// 禁用 XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// 隐藏 WordPress 的版本号
add_filter('the_generator', function() {
    return 'X';
});

// 禁用所有RSS
add_action('init', function() {
    $feed_actions = array(
        'do_feed',
        'do_feed_rdf',
        'do_feed_rss',
        'do_feed_rss2',
        'do_feed_atom',
        'do_feed_rss2_comments',
        'do_feed_atom_comments',
    );

    foreach ($feed_actions as $action) {
        add_action($action, function() {
            wp_die(__('RSS feeds are disabled.'), '', array('response' => 404));
        }, 1);
    }

    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
});
```