<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	// fonts
	'font_path' => base_path('public/admin/font/s/'),
	'font_data' => [
		'Cairo' => [
			'R'  => 'Cairo-Regular.ttf',    // regular font
			'B'  => 'Cairo-Bold.ttf',       // optional: bold font
			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
		// ...add as many as you want.
	],
];
