# MediaWiki-GoogleTagManager Extension

This extension allows you to seamlessly integrate [Google Tag Manager](https://tagmanager.google.com/) into your MediaWiki website.

## Installation

1. Clone this repository inside your `extensions/` directory.
    ```bash
    cd extensions/
    git clone https://github.com/gboyers/MediaWiki-GoogleTagManager.git GoogleTagManager
    ```

2. Add the following code to your `LocalSettings.php`:
    ```php
    wfLoadExtension('GoogleTagManager');
    $wgGoogleTagManagerID = 'GTM-XXXXXX'; // Replace with your actual Google Tag Manager ID
    ```

3. Navigate to `Special:Version` on your wiki to verify the extension is successfully installed.

## Configuration

- `$wgGoogleTagManagerID`: Set this configuration variable to your Google Tag Manager container ID.

## Usage

Once installed and configured, the Google Tag Manager script will be automatically embedded into the pages of your MediaWiki site. You can then utilise the Google Tag Manager dashboard to manage your tags, triggers, and variables.

## Content Security Policy

Newer versions of MediaWiki can use [Content Security Policy (CSP)](https://www.mediawiki.org/wiki/Manual:$wgCSPHeader) to prevent scripts being called from other websites. 

This extension is being modified to work with default Mediawiki CSP settings, but may not work if you enabled stricter settings. You can read up on [Mediawiki's plans for CSP](https://www.mediawiki.org/wiki/Requests_for_comment/Content-Security-Policy).  

This version of ths extension passes the 'nonce' code to Google Tag Manager, which is unique every time the page loads. This solves some of the issues with enabling CSP.

However, individual scripts you use via Google Tag Manager may not work. In your `LocalSettings.php`, you can add or modify the `$wgCSPHeader` configuration as follows to allow each domain. 

For example, to use Google Tag Manager's [Tag Assistant](https://tagassistant.google.com/), the following configuration (at minimum) is required

```php
$wgCSPHeader = [
    'script-src' => [ 'https://tagmanager.google.com' ],
    'style-src' => [ 'https://tagmanager.google.com', 'https://fonts.googleapis.com' ],
    'img-src' => [ 'https://ssl.gstatic.com', 'https://www.gstatic.com' ],
    'font-src' => [ 'https://fonts.gstatic.com', 'data:' ]
];
```

See [Manual:$wgCSPHeader](https://www.mediawiki.org/wiki/Manual:$wgCSPHeader) for more information.

## Contributing

Contributions to this extension are warmly welcomed! If you encounter any issues or have suggestions for improvements, please submit them to the GitHub repository's [issues page](https://github.com/gboyers/MediaWiki-GoogleTagManager/issues).

## License

This extension is licensed under [GPL-3.0-or-later](https://www.gnu.org/licenses/gpl-3.0.html).

## See Also

- [Google Tag Manager Official Site](https://tagmanager.google.com/)
- [MediaWiki Extensions Manual](https://www.mediawiki.org/wiki/Manual:Extensions)
