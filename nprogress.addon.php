<?php
/**
 * @file nprogress.addon.php
 * @author BJRambo (sosifam@070805.co.kr)
 * @brief nprogress
 **/

if (!defined("__XE__"))
{
	exit();
}

if ($addon_info->only_admin != 'Y')
{
	if ($this->module == "admin")
	{
		return;
	}
}


if ($called_position == 'before_module_init')
{

	Context::addCSSFile("./addons/nprogress/css/nprogress.css", false);
	Context::addJSFile("./addons/nprogress/js/nprogress.js", false);

	$barcolor = $addon_info->barcolor;
	if (empty($barcolor))
	{
		$barcolor = 'ffe300;';
	}
	$spincolor = $addon_info->spincolor;
	if (empty($spincolor))
	{
		$spincolor = 'ffe300';
	}
	$shadowcolora = $addon_info->shadowcolora;
	if (empty($shadowcolora))
	{
		$shadowcolora = 'fff100';
	}
	$shadowcolorb = $addon_info->shadowcolorb;
	if (empty($shadowcolorb))
	{
		$shadowcolorb = 'fff38a';
	}
	$zindex = $addon_info->zindex;
	if (empty($zindex))
	{
		$zindex = '100';
	}

	$NProgress = "
	<script>
	jQuery(function($){
		$('body').show();
		NProgress.start();
		setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
	});
	</script>
	<style>
	#nprogress .bar {background:#{$barcolor} !important;}
	#nprogress .spinner-icon {border-top-color: #{$spincolor} !important;border-left-color: #{$spincolor} !important;}
	#nprogress .peg {box-shadow: 0 0 10px #{$shadowcolora}, 0 0 5px #{$shadowcolorb};}#nprogress .bar{z-index:{$zindex} }
	#nprogress .spinner{z-index:{$zindex} }
	</style>";
	Context::addHtmlHeader($NProgress);
}
