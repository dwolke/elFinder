#Volume Drivers

##Dropbox Driver

Dropbox volume driver need **dropbox-php's Dropbox** and **PHP OAuth extension** or **PEAR's HTTP_OAUTH package** (*HTTP_OAUTH package require HTTP_Request2 and Net_URL2*)

* dropbox-php: http://www.dropbox-php.com/
* PHP OAuth extension: http://pecl.php.net/package/oauth
* PEAR's HTTP_OAUTH package: http://pear.php.net/package/http_oauth

Dropbox driver need next two settings. You can get at https://www.dropbox.com/developers

	define('ELFINDER_DROPBOX_CONSUMERKEY',    '');
	define('ELFINDER_DROPBOX_CONSUMERSECRET', '');
	define('ELFINDER_DROPBOX_META_CACHE_PATH',''); // optional for `options['metaCachePath']`


