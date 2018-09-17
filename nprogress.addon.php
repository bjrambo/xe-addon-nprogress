<?php
/**
	* @file nprogress.addon.php
	* @author BJRambo (sosifam@070805.co.kr)
	* @brief nprogress
**/

if(!defined("__XE__")) exit();
$ai = $addon_info;

if($ai->only_admin!='Y'){
	if($this->module == "admin") return; // 관리자가 아니면 return
}


// 아래는 수정하지 마세요.
$_program_name = 'nprogress';
if($logged_info->is_admin=='Y'):
$_program_version = $ai->version;
$_analytics_server = 'http://sosifam.com/dd/apisosi.php';
$_analytics_host_info = '?v=2&name='.$_program_name.'&program_version='.urlencode($_program_version).'&site_domain='.urlencode(getenv('HTTP_HOST')).'&referer_url='.urlencode(getenv('HTTP_HOST').getenv('REQUEST_URI')).'&php='.phpversion().'&xe_version='.__XE_VERSION__.'&user_agent='.urlencode(getenv('HTTP_USER_AGENT'));
$_analytics_url = $_analytics_server.$_analytics_host_info;
endif;


if($called_position == 'before_module_init') {

	Context::addCSSFile("./addons/nprogress/css/nprogress.css", false);
	Context::addJSFile("./addons/nprogress/js/nprogress.js", false);
	
	$barcolor = $ai->barcolor;
		if (empty($barcolor))$barcolor = 'ffe300;';
	$spincolor = $ai->spincolor;
		if (empty($spincolor))$spincolor = 'ffe300';
	$shadowcolora = $ai->shadowcolora;
		if (empty($shadowcolora))$shadowcolora = 'fff100';
	$shadowcolorb = $ai->shadowcolorb;
		if (empty($shadowcolorb))$shadowcolorb = 'fff38a';
	$zindex = $ai->zindex;
		if (empty($zindex))$zindex = '100';

	$NProgress = "<script type='text/javascript'>jQuery(function($){ $('body').show(); $('.version').text(NProgress.version); NProgress.start(); setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 400); });</script>
	<style type='text/css'>#nprogress .bar {background:#{$barcolor} !important;}#nprogress .spinner-icon {border-top-color: #{$spincolor} !important;border-left-color: #{$spincolor} !important;}#nprogress .peg {box-shadow: 0 0 10px #{$shadowcolora}, 0 0 5px #{$shadowcolorb};}#nprogress .bar{z-index:{$zindex} }#nprogress .spinner{z-index:{$zindex} }</style>";
	Context::addHtmlHeader($NProgress);
}
?>