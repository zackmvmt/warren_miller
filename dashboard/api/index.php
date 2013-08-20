<?php

	require_once 'Slim/Slim.php';
	require_once 'idiorm.php';
	
	ORM::configure('mysql:host=108.171.172.251;dbname=wme_2012');
	ORM::configure('username', 'fbdev');
	ORM::configure('password', 'Movement456');
	
	$app = new Slim();
	
	// gets all of the shows
	$app->get('/shows', function() {
		
		$shows = ORM::for_table('shows')->find_many();
		$results = array();
		
		foreach($shows as $show) {
			$results[] = $show->as_array();
		}
		
		echo json_encode($results);
		
	});
	
	// gets a specific show
	$app->get('/shows/:show_id', function($show_id) {
		
		$show = ORM::for_table('shows')->find_one($show_id);
		
		echo json_encode($show->as_array());
		
	});
	
	// given an id, get all the shows for the same city
	$app->get('/shows/:show_id/venue', function($show_id) {
		
		// get the show and city
		$show = ORM::for_table('shows')->find_one($show_id);
		$venue = $show->venue;
		
		// get all the shows for that city
		$shows = ORM::for_table('shows')
			->where('venue', $venue)
			->find_many();
		$results = array();
			
		foreach($shows as $show) {
			$results[] = $show->as_array();
		}
		
		echo json_encode($results);
		
	});
	
	// get a show within a certain radius of x
	$app->get('/shows/zip/:zip/radius/:radius', function($zip, $radius) {
		
		// get all the shows
		$db_shows = ORM::for_table('shows')->find_many();
		$shows = array();
		
		// loop through each show and get the lat and long
		foreach($db_shows as $show) {
			$temp = $show->as_array();
			$location = ORM::for_table('zips')
				->where('city', $show->city)
				->where('state abbreviation', $show->state)
				->find_one();
			if ($location) {
				$temp['lat'] = $location->latitude;
				$temp['long'] = $location->longitude;
				$temp['zip'] = $location->get('zip code');
			}
			$shows[] = $temp;
		}
		
		// get the lat and long for the zip provided
		$user_location = ORM::for_table('zips')
			->where('zip code', $zip)
			->find_one();
		if ($user_location) {
		
			$lat_A = $user_location->latitude;
			$long_A = $user_location->longitude;
			$results = array();
			
			// filter results
			foreach($shows as $show) {
				
				if (array_key_exists('lat', $show) && array_key_exists('long', $show)) {
					$lat_B = $show['lat'];
					$long_B = $show['long'];
					
					$dist = sin(deg2rad($lat_A)) 
						* sin(deg2rad($lat_B)) 
						+ cos(deg2rad($lat_A)) 
						* cos(deg2rad($lat_B)) 
						* cos(deg2rad($long_A - $long_B)); 
					
					$dist = (rad2deg(acos($dist))) * 69.09;
					
					if ($dist <= $radius) {
						$show['dist'] = $dist;
						$results[] = $show;
					}
				}
			}
			
			echo json_encode($results);
			
		} else {
			
			echo json_encode(array('status'=>'fail', 'message'=>'ERROR: could not find the lat and long for the supplied zip code'));
			
		}
		
	});
	
	// create a show
	$app->post('/shows', function() use($app) {
		
		try {
			
			$show = ORM::for_table('shows')->create();
			$body = $app->request()->getBody();
			$json = json_decode($body, true);
			
			foreach ($json as $key => $value) {
				$show->set($key, $value);
			}
			
			$show->save();
			
			echo json_encode($show->as_array());
			
		} catch (Exception $e) {
			
			echo 'fail: ' . $e;
			
		}
		
	});
	
	// update a show
	$app->put('/shows/:show_id', function($show_id) use($app) {
		
		try {
			
			$show = ORM::for_table('shows')->find_one($show_id);
			$body = $app->request()->getBody();
			$json = json_decode($body, true);
			
			foreach ($json as $key => $value) {
				$show->set($key, $value);
			}
			
			$show->save();
			
			echo json_encode($show->as_array());
			
		} catch (Exception $e) {
			
			echo 'fail: ' . $e;
			
		}
		
	});
	
	// delete a show
	$app->delete('/shows/:show_id', function($show_id) use($app) {
		
		try {
		
			$show = ORM::for_table('shows')->find_one($show_id);
			$show->delete();
			
		} catch (Exception $e) {
			
			echo 'fail: ' . $e;
			
		}
		
	});
	
	
	/*
	
	// add a new email
	$app->post('/signup', function() use($app) {
		
		try {
		
			$email = $app->request()->params('email');
			$dob = $app->request()->params('dob');
			$now = $app->request()->params('now');
			
			$row = ORM::for_table('emails')->create();
			$row->email = $email;
			$row->dob = $dob;
			$row->entered_on = $now;
			$row->save();
			
			echo 'success';
			
		} catch (Exception $e) {
		
			echo 'fail: ' . $e;
			
		}
		
	});
	
	// POLL FUNCTIONS
	
	// update the poll numbers
	$app->post('/poll/:num', function($num) {
		
		$row = ORM::for_table('poll')->find_one($num);
		$row->count++;
		$row->save();
		
		// get all the rows
		$rows = ORM::for_table('poll')->find_many();
		
		// make a json array of the results
		$results = array();
		
		foreach($rows as $row) {
			$results[] = $row->count;
		}
		
		echo json_encode($results);
		
	});
	
	// get the poll numbers
	$app->get('/poll', function() {
		
		// get all the rows
		$rows = ORM::for_table('poll')->find_many();
		
		// make a json array of the results
		$results = array();
		
		foreach($rows as $row) {
			$results[] = $row->count;
		}
		
		echo json_encode($results);
		
	});
	
	// SIGNUP FUNCTIONS
	
	
	*/
	$app->run();