<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    
	function index() {

		return view('control');

	}

	function sync() {

		try {

			$categories = [];
			$products 	= [];

			$response 	= Http::get('https://portal.panelo.co/paneloresto/api/productlist/18');

			$json 		= $response->json();

			foreach( $json['products'] as $category ) {

				$categories[] = [
					'id' 	=> $category['id'],
					'name' 	=> $category['name']
				];

				foreach ( $category['products'] as $item) {
					
					$products[] = [
						'id' 		=> $item['id'],
						'title' 	=> $item['title'],
						'price' 	=> $item['price']['price'],
						'preview' 	=> $item['preview']['content'],
						'category' 	=> $category['id']
					];
					
				}

			}

			DB::transaction(function () use ($categories, $products) {

				DB::table('tbl_category')->insertOrIgnore($categories);

				DB::table('tbl_product')->insertOrIgnore($products);

			});

			$res = redirect()->back()->with('success_message', 'Sync Completed');

			return $res;

		}catch( \Exception $e ) {

			$res = redirect()->back()->with('error_message', 'Sync Error | ' . $e->getMessage());

			return $res;

		}

	}

}