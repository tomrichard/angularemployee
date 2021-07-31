<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$categories = DB::table('tbl_category')->select('id', 'name')->get();
    
	return view('crud', compact('categories'));

});

Route::get('/control', 		[\App\Http\Controllers\SyncController::class, 'index'])
	->name('control.index');

Route::post('/control/sync', [\App\Http\Controllers\SyncController::class, 'sync'])
	->name('control.sync');


Route::get('/query', function () {

	// ---------------------------------------------------------------------------

	$query = "SELECT 
				a.name,
				(
					SELECT 
						tbl_person.emotion 
					FROM 
					( 
						SELECT 
							person.name, emotions.emotion, 
							( 
								select count(id) FROM tbl_emotion 
									WHERE 
										tbl_emotion.name = person.name
									and
										tbl_emotion.emotion = emotions.emotion
							) as counter
						FROm 
							( SELECT distinct name FROM `tbl_emotion` ) as person, 
							( SELECT DISTINCT emotion FROM `tbl_emotion` ) AS emotions
					) AS tbl_person
					
					WHERE
						tbl_person.name=a.name
						AND 
						tbl_person.counter=(
							SELECT MAX(counter_emotion.counter) FROM
							(
								SELECT 
									person.name, emotions.emotion, ( 
										SELECT COUNT(id) FROM tbl_emotion 
											WHERE 
												tbl_emotion.name = person.name
											AND
												tbl_emotion.emotion = emotions.emotion
									) AS counter
								FROM 
									( SELECT DISTINCT NAME FROM `tbl_emotion` ) AS person, 
									( SELECT DISTINCT emotion FROM `tbl_emotion` ) AS emotions
							) AS counter_emotion
							WHERE counter_emotion.name = tbl_person.name
							LIMIT 1
						)
				) AS emotion
			FROM
				( SELECT distinct name FROM `tbl_emotion` ) as a
			";

	$query_modus_emotion 	= $query;

	$modus_emotion 			= DB::select($query);

	// ---------------------------------------------------------------------------

	$query = "SELECT 
				a.name, a.created, 
				
				( 
					SELECT 
						tbl_person.emotion 
					FROM 
					(
						SELECT 
						person.name, DATE(person.created) AS created, emotions.emotion, 
							( 
								select count(id) FROM tbl_emotion 
									WHERE 
										tbl_emotion.name = person.name
									and
										tbl_emotion.emotion = emotions.emotion
									AND 	
										DATE(tbl_emotion.created) = DATE(person.created)
							) as counter
						FROm 
							( SELECT distinct name, created FROM `tbl_emotion` ) as person, 
							( SELECT DISTINCT emotion FROM `tbl_emotion` ) AS emotions
						ORDER BY person.name, person.created , emotions.emotion
						
					) tbl_person
					
					WHERE 
						tbl_person.name 	= a.name
						AND
						tbl_person.created 	= a.created
						AND 
						tbl_person.counter 	= (
							
							SELECT MAX(counter_emotion.counter) FROM
							(
								SELECT 
									person.name, DATE(person.created) AS created, emotions.emotion, 
										( 
											select count(id) FROM tbl_emotion 
												WHERE 
													tbl_emotion.name = person.name
												and
													tbl_emotion.emotion = emotions.emotion
												AND 	
													DATE(tbl_emotion.created) = DATE(person.created)
										) as counter
									FROm 
										( SELECT distinct name, created FROM `tbl_emotion` ) as person, 
										( SELECT DISTINCT emotion FROM `tbl_emotion` ) AS emotions
							) AS counter_emotion
							WHERE 
								counter_emotion.name 	= tbl_person.name
								AND 
								counter_emotion.created = tbl_person.created
							
						)
					LIMIT 1
				) as emotion,
				
				(
					SELECT AVG(e.score) FROM `tbl_emotion` e 
						WHERE e.name=a.name
						AND 	
						DATE(e.created) = a.created
				) AS avg_score
			FROM
				( SELECT distinct `tbl_emotion`.name, DATE(`tbl_emotion`.created) as created FROM `tbl_emotion` ) as a
				ORDER BY a.name, a.created";

	$query_averages 		= $query;

	$averages 				= DB::select($query);

	return view('query', compact('modus_emotion', 'query_modus_emotion', 'averages', 'query_averages'));

});
