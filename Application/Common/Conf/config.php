<?php
return array(
	'DB_TYPE'=>'mysqli',
	'DB_HOST'=>'127.0.0.1',
	'DB_NAME'=>'serverhub',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>3306,
	'DB_PREFIX'=>'',

'TMPL_PARSE_STRING'  =>array(
    // '__PUBLIC__' => '/Common', // Change the default __PUBLIC__ replacement rule
     '__JS__' => '/Public/JS/', // Add a new JS library path replacement rule
     '__UPLOAD__' =>__ROOT__ .'/Uploads', // Add a new upload path replacement rule
	 '__RES__' => __ROOT__.'/Application/Home/View/Public',
),
    'LOAD_EXT_CONFIG' => 'setting', 
	'SHOW_ERROR_MSG' =>    false,    //To or Not to Display Errors
	'ERROR_MESSAGE'  =>    'Error occurred, please contact admin' ,

	//'SHOW_PAGE_TRACE' =>true, 

	'TRACE_PAGE_TABS'=>array(
	 	'base|sql'=>'basic+sql',
		 'think'=>'process',
		 'error'=>'error',
		 'debug'=>'debug'
	),

	'db_params' => array(PDO::ATTR_PERSISTENT => true),
);