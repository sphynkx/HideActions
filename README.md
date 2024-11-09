[Mediawiki](https://www.mediawiki.org/) extension for [Veda.Wiki](https://veda.wiki/) project. Disable possibility to view wiki source of pages for unauthorized users.
## Install
* Dowload and unpack to Mediawiki's `extensions/` directory.
* Set in `LocalSettings.php`

        `wfLoadExtension( 'HideActions' );`
        `$wgActions['raw'] = false;`
