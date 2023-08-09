<?php

class GoogleTagManagerHooks {

public static function onExtensionLoad() {
    // Code that runs when your extension is loaded
}

public static function onBeforePageDisplay(OutputPage &$out, Skin &$skin) {
    global $wgGoogleTagManagerID;

    if (!$wgGoogleTagManagerID) {
        return true;
    }

    // Add the script in <head>
    $out->addHeadItem('gtm_head', "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . htmlspecialchars($wgGoogleTagManagerID) . "');</script>");

    // Add the noscript block right after the opening <body> tag
    $out->prependHTML('<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . htmlspecialchars($wgGoogleTagManagerID) . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>');

    return true;
}
}

?>