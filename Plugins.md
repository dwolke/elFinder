#Plugins

Plugin configuration samples

##Plugin AutoResize

Auto resize on file upload.

###Configuration example

binding, configure on connector options 
	
	$opts = array(
	
		'bind' => array(
			'upload.presave' => array(
				'Plugin.AutoResize.onUpLoadPreSave'
			)
		),
		
		// global configure (optional)
		'plugin' => array(
			'PluginAutoResize' => array(
				'enable'         => true,       // For control by volume driver
				'maxWidth'       => 1024,       // Path to Water mark image
				'maxHeight'      => 1024,       // Margin right pixel
				'quality'        => 95,         // JPEG image save quality
				// Target image formats (bit-field)
				'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP 
			)
		),
		
		// each volume configure (optional)
		'roots' => array(
			array(
				'driver' => 'LocalFileSystem',
				'path'   => '/path/to/files/',
				'URL'    => 'http://localhost/to/files/'
				'plugin' => array(
					'PluginAutoResize' => array(
						'enable'         => true,       // For control by volume driver
						'maxWidth'       => 1024,       // Path to Water mark image
						'maxHeight'      => 1024,       // Margin right pixel
						'quality'        => 95,         // JPEG image save quality
						// Target image formats (bit-field)
						'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP
					)
				)
			)
		)
		
	);

---

##Plugin Normalizer

UTF-8 Normalizer of file-name and file-path etc.

* nfc(NFC): Canonical Decomposition followed by Canonical Composition
* nfkc(NFKC): Compatibility Decomposition followed by Canonical

This plugin require Class "Normalizer" (PHP 5 >= 5.3.0, PECL intl >= 1.0.0) or PEAR package "I18N_UnicodeNormalizer"

###Configuration example

binding, configure on connector options

	$opts = array(
		
		'bind' => array(
			'mkdir.pre mkfile.pre rename.pre' => array(
				'Plugin.Normalizer.cmdPreprocess'
			),
			'upload.presave' => array(
				'Plugin.Normalizer.onUpLoadPreSave'
			)
		),
		
		// global configure (optional)
		'plugin' => array(
			'Normalizer' => array(
				'enable' => true,
				'nfc'    => true,
				'nfkc'   => true
			)
		),
		
		// each volume configure (optional)
		'roots' => array(
			array(
				'driver' => 'LocalFileSystem',
				'path'   => '/path/to/files/',
				'URL'    => 'http://localhost/to/files/'
				'plugin' => array(
					'Normalizer' => array(
					'enable' => true,
					'nfc'    => true,
					'nfkc'   => true
				)
			)
		)
		
	);

---

##Plugin Sanitizer

Sanitizer of file-name and file-path etc.

###Configuration example

binding, configure on connector options

	$opts = array(
	
		'bind' => array(
			'mkdir.pre mkfile.pre rename.pre' => array(
				'Plugin.Sanitizer.cmdPreprocess'
			),
			'upload.presave' => array(
				'Plugin.Sanitizer.onUpLoadPreSave'
			)
		),
		
		// global configure (optional)
		'plugin' => array(
			'Sanitizer' => array(
				'enable' => true,
				'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
				'replace'  => '_'    // replace to this
			)
		),
		
		// each volume configure (optional)
		'roots' => array(
			array(
				'driver' => 'LocalFileSystem',
				'path'   => '/path/to/files/',
				'URL'    => 'http://localhost/to/files/'
				'plugin' => array(
					'Sanitizer' => array(
						'enable' => true,
						'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
						'replace'  => '_'    // replace to this
					)
				)
			)
		)
		
	);

---

##Plugin Watermark

Print watermark on file upload.

###Configuration example

binding, configure on connector options

	$opts = array(
		
		'bind' => array(
			'upload.presave' => array(
				'Plugin.Watermark.onUpLoadPreSave'
			)
		),
		
		// global configure (optional)
		'plugin' => array(
			'Watermark' => array(
				'enable' => true,       // For control by volume driver
				'source' => 'logo.png', // Path to Water mark image
				'marginRight' => 5,          // Margin right pixel
				'marginBottom' => 5,          // Margin bottom pixel
				'quality' => 95,         // JPEG image save quality
				'transparency' => 70,         // Water mark image transparency (other than PNG)
				'targetType' => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats (bit-field)
				'targetMinPixel' => 200         // Target image minimum pixel size
			)
		),
		
		// each volume configure (optional)
		'roots' => array(
			array(
				'driver' => 'LocalFileSystem',
				'path'   => '/path/to/files/',
				'URL'    => 'http://localhost/to/files/'
				'plugin' => array(
					'Watermark' => array(
						'enable' => true,       // For control by volume driver
						'source' => 'logo.png', // Path to Water mark image
						'marginRight' => 5,          // Margin right pixel
						'marginBottom' => 5,          // Margin bottom pixel
						'quality' => 95,         // JPEG image save quality
						'transparency' => 70,         // Water mark image transparency (other than PNG)
						'targetType' => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats (bit-field)
						'targetMinPixel' => 200         // Target image minimum pixel size
					)
				)
			)
		)
		
	);

.








