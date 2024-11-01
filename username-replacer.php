<?php
/*
Plugin Name: Username replacer
Plugin URI: http://zbarassky.com/?page_id=1236
Description: For livejournal.com, lj.rossia.org, wordpress.org, ya.ru, blogs.mail.ru, lleo.aha.ru, habrahabr.ru and blogspot.com users only. &lt;lj user="username"/>, &lt;lj user="username">, &lt;lj comm="community"/>, &lt;lj comm="community">, &lt;ljr user="username">, &lt;ljr comm="community">, &lt;wp user="username">, &lt;ya user="username">, &lt;mr user="username">, &lt;mr comm="community">, &lt;ll user="username">, &lt;hb user="username">, &lt;hb comm="community"> and &lt;bs user="username"> will be replaces with correct HTML code.
Version: 0.5.1
Author: Stanislav Zbarassky
Author URI: http://zbarassky.com/
*/

/*
  Copyright © 2009 by Stanislav Zbarassky
  Based on code of WP-plugin called 'LJ user ex' by Michael Elfimov
  Released under the GPL v.3 license.
*/

function lj_user_ex($content) {
	$content = preg_replace('/<lj user="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://users.livejournal.com/$1/profile"><img src="http://stat.livejournal.com/img/userinfo.gif" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 17px; height: 17px;"></a>&nbsp;<a href="http://users.livejournal.com/$1/"><b>$1</b></a>', $content);
	$content = preg_replace('/<lj comm="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://community.livejournal.com/$1/profile"><img src="http://stat.livejournal.com/img/community.gif" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 16px; height: 16px;"></a>&nbsp;<a href="http://community.livejournal.com/$1/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'lj_user_ex');
add_filter('comment_text', 'lj_user_ex');

function ljr_user_ex($content) {
	$content = preg_replace('/<ljr user="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://lj.rossia.org/userinfo.bml?user=$1"><img src="http://lj.rossia.org/img/userinfo.gif" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 17px; height: 17px;"></a>&nbsp;<a href="http://lj.rossia.org/users/$1/"><b>$1</b></a>', $content);
	$content = preg_replace('/<ljr comm="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://lj.rossia.org/userinfo.bml?user=$1"><img src="http://lj.rossia.org/img/community.gif" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 16px; height: 16px;"></a>&nbsp;<a href="http://lj.rossia.org/community/$1/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'ljr_user_ex');
add_filter('comment_text', 'ljr_user_ex');

function wp_user_ex($content) {
	$content = preg_replace('/<wp user="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://wordpress.org/favicon.ico" alt="" style="border: 0pt none ; vertical-align: bottom; width: 17px; height: 17px;">&nbsp;<a href="http://$1.wordpress.com/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'wp_user_ex');
add_filter('comment_text', 'wp_user_ex');

function ya_user_ex($content) {
	$content = preg_replace('/<ya user="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://$1.ya.ru"><img src="http://img-css.friends.yandex.net/favicon.ico" alt="info" style="border: 0pt none ; vertical-align: bottom; width: 16px; height: 16px;"></a>&nbsp;<a href="http://$1.ya.ru/index_blog.xml"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'ya_user_ex');
add_filter('comment_text', 'ya_user_ex');

function mr_user_ex($content) {
	$content = preg_replace('/<mr user="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://img.mail.ru/mail/ru/images/blogs/user.gif" alt="" style="border: 0pt none ; vertical-align: bottom; width: 13px; height: 13px;">&nbsp;<a href="http://blogs.mail.ru/mail/$1/"><b>$1</b></a>', $content);
	$content = preg_replace('/<mr comm="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://img.mail.ru/mail/ru/images/blogs/community.gif" alt="" style="border: 0pt none ; vertical-align: bottom; width: 13px; height: 13px;">&nbsp;<a href="http://my.mail.ru/community/$1/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'mr_user_ex');
add_filter('comment_text', 'mr_user_ex');

function ll_user_ex($content) {
	$content = preg_replace('/<ll user="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://lleo.aha.ru/favicon.ico" alt="" style="border: 0pt none ; vertical-align: bottom; width: 16px; height: 16px;">&nbsp;<a href="http://lleo.aha.ru/dnevnik/logon?userinfo=$1"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'll_user_ex');
add_filter('comment_text', 'll_user_ex');

function hb_user_ex($content) {
	$content = preg_replace('/<hb user="([a-zA-Z0-9\._-]+)"\/?>/', '<a href="http://$1.habrahabr.ru/"><img src="http://habrahabr.ru/i/bg-user2.gif" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 12px; height: 12px;"></a>&nbsp;<a href="http://$1.habrahabr.ru/blog/"><b>$1</b></a>', $content);
	$content = preg_replace('/<hb comm="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://habrahabr.ru/i/icos/blog-small-open.png" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 14px; height: 14px;">&nbsp;<a href="http://habrahabr.ru/blogs/$1/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'hb_user_ex');
add_filter('comment_text', 'hb_user_ex');

function bs_user_ex($content) {
	$content = preg_replace('/<bs user="([a-zA-Z0-9\._-]+)"\/?>/', '<img src="http://www.blogger.com/favicon.ico" alt="[info]" style="border: 0pt none ; vertical-align: bottom; width: 16px; height: 16px;">&nbsp;<a href="http://$1.blogspot.com/"><b>$1</b></a>', $content);
	return $content;
}

add_filter('the_content', 'bs_user_ex');
add_filter('comment_text', 'bs_user_ex');

?>