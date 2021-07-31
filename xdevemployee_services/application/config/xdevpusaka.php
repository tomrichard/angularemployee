<?php 
define('ROOTDIR', __DIR__ . "/../");

return [

	//'apiurl' => 'http://localhost:8008/'

	'key'			=> env('APP_KEY'),

	'apiurl' 		=> env('API_URL', ''),

	'localapiurl'	=> env('LOCAL_API_URL', ''),

	'databases' => [

		'default' => [
			
			'cache'		=> ':root:/storage/framework/cache/query/',
			'debug'		=> storage_path('app/debug/'),
			'driver'	=> env('DB_CONNECTION', 'mysql'),
			'hostname' 	=> env('DB_HOST', 'localhost'),
			'port'		=> env('DB_PORT', '3306'),
			'database'  => env('DB_DATABASE', ''),
			'username'	=> env('DB_USERNAME', 'root'),
			'password' 	=> env('DB_PASSWORD', ''),

		]

	],

	'upload'	=> [

		'broken'		=> storage_path('app/public/') . 'broken.png',
		'storage' 		=> storage_path('app/download/'),
		'ext_image'		=> 'jpg|jpeg|png',
		'max_image'		=> 5000, // KB
		'ext_document'	=> 'xlsx|xls|pdf|docx|doc',
		'max_document'	=> 500, // KB
		'ext_pdf'		=> 'pdf',
		'max_pdf'		=> 500, // KB
		'ext_mix'		=> 'jpg|jpeg|png|pdf',
		'max_mix'		=> 500, // KB

	],

	'role'		=> [

		'storage'		=> storage_path('app/roles/')

	]

];