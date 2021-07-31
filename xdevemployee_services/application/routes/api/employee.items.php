<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Xdevpusaka\Database\Manager;
use Xdevpusaka\Upload\Upload;
use Xdevpusaka\DataTable;

Route::get('/employee/items', function (Request $request) {

	$response 	= [
		"status" 	=> "ok",
		"code"		=> "",
		"message"	=> "",
		"data"		=> []
	];

	try {

		$param 		= $request->input('_param');
		$param 		= json_decode($param);

		$Datatable 	= new DataTable\Builder();

		$Datatable->setLimit(10);

		$Datatable->table(function($query) {
			$query->table('tbl_product');
		});

		$Datatable->total(function($query, $as) {
			$query->select("COUNT(tbl_product.id) AS {$as}");
		});

		$Datatable->select([
			'id' 			=> 'tbl_product.id',
			'title' 		=> 'tbl_product.title',
			'price' 		=> 'tbl_product.price',
			'preview' 		=> 'tbl_product.preview',
			'category' 		=> 'tbl_product.category'
		]);

		$Datatable->filter(function($query) use ($param) {

			if(isset($param->category)) {
				
				$query->where('category', $param->category);

			}

			// $query->joinLeft('hrm_job_title', function($query) {
			// 	$query->on('hrm_job_vacancy.job_title_id', 
			// 		'=', 'hrm_job_title.uuid');
			// });

			// $query->where('is_deleted', '0');

			$query->orderBy('tbl_product.id', 'desc');

		});

	    $response['data'] 			= $Datatable->json();

	    $response['param']			= $param;

	}catch(Exception $e) {

		Log::error($e);

		$response['status'] 		= "error";
		$response['code'] 			= 500;
		$response['message'] 		= "Database error. (check database log)";

	}

	return $response;


});