<?php

Route::get('/', 'AdminController@index');
Route::post('/admin/login', 'AdminController@login');
Route::get('/forgot', 'AdminController@forgot');
//Route::post('/forgot', 'AdminController@password');
Route::post('/update/password', 'AdminController@updatePassword');
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


Route::group(['middleware' => ['admin']], function(){

	Route::get('logout', 'AdminController@logout');
	Route::get('/admin',function() {
		Session::put('page', 'admin');
		return view('backend/index');
	});
	Route::get('/admin/crop', 'CropController@index');
	Route::get('/admin/crop/delete/{id}/{cropName}', 'CropController@delete');
	Route::get('/admin/crop/edit/{id}', 'CropController@edit');
	Route::post('/admin/crop/update/{id}', 'CropController@update');
	Route::get('/admin/crop/add', 'CropController@create');
	Route::post('/admin/add/crop', 'CropController@store');
	// Fertilizer
	Route::get('/admin/fertilizer','FertilizerController@index');
	//Route::get('/admin/fertilizer/delete/{id}', 'FertilizerController@delete');
	Route::get('/admin/fertilizer/edit/{id}', 'FertilizerController@edit');
	Route::post('/admin/fertilizer/update/{id}', 'FertilizerController@update');
	Route::get('/admin/fertilizer/add', 'FertilizerController@create');
	Route::post('/admin/add/fertilizer', 'FertilizerController@store');
	// Harvesting
	Route::get('/admin/harvesting','HarvestingController@index');
	//Route::get('/admin/harvesting/delete/{id}', 'HarvestingController@delete');
	Route::get('/admin/harvesting/edit/{id}', 'HarvestingController@edit');
	Route::post('/admin/harvesting/update/{id}', 'HarvestingController@update');
	Route::get('/admin/harvesting/add', 'HarvestingController@create');
	Route::post('/admin/add/harvesting', 'HarvestingController@store');
	//Cultivatgion
	Route::get('/admin/cultivation','CultivationController@index');
	//Route::get('/admin/cultivation/delete/{id}', 'CultivationController@delete');
	Route::get('/admin/cultivation/edit/{id}', 'CultivationController@edit');
	Route::post('/admin/cultivation/update/{id}', 'CultivationController@update');

	Route::get('/admin/cultivation/add', 'CultivationController@create');
	Route::post('/admin/add/cultivation', 'CultivationController@store');
	//Disease 
	Route::get('/admin/disease','DiseaseController@index');
	//Route::get('/admin/disease/delete/{id}', 'DiseaseController@delete');
	Route::get('/admin/disease/edit/{id}', 'DiseaseController@edit');
	Route::post('/admin/disease/update/{id}', 'DiseaseController@update');

	Route::get('/admin/disease/add', 'DiseaseController@create');
	Route::post('/admin/add/disease', 'DiseaseController@store');
	// Land Preparation
	Route::get('/admin/land/preparation', 'LandPreparationController@index');
	//Route::get('/admin/land/preparation/delete/{id}', 'LandPreparationController@delete');
	Route::get('/admin/land/preparation/edit/{id}', 'LandPreparationController@edit');
	Route::post('/admin/land/preparation/update/{id}', 'LandPreparationController@update');
	Route::get('/admin/land/preparation/add', 'LandPreparationController@create');
	Route::post('/admin/add/land/preparation', 'LandPreparationController@store');
	// Kisan News
	Route::get('/admin/kisan', 'KisanController@index');
	Route::get('/admin/kisan/delete/{id}', 'KisanController@delete');
	Route::get('/admin/kisan/add', 'KisanController@create');
	Route::post('/admin/add/kisan', 'KisanController@store');
	// Weed

	Route::get('/admin/weed', 'WeedController@index');
	//Route::get('/admin/weed/delete/{id}', 'WeedController@delete');
	Route::get('/admin/weed/edit/{id}', 'WeedController@edit');
	Route::post('/admin/weed/update/{id}', 'WeedController@update');

	Route::get('/admin/weed/add', 'WeedController@create');
	Route::post('/admin/add/weed', 'WeedController@store');

	// Watering Support
	Route::get('/admin/watering', 'WateringController@index');
	//Route::get('/admin/watering/delete/{id}', 'WateringController@delete');
	Route::get('/admin/watering/edit/{id}', 'WateringController@edit');
	Route::post('/admin/watering/update/{id}', 'WateringController@update');
	Route::get('/admin/watering/add', 'WateringController@create');
	Route::post('/admin/add/watering', 'WateringController@store');
	// 
	Route::get('/admin/pesticides', 'PesticidesController@index');
	//Route::get('/admin/pesticides/delete/{id}', 'PesticidesController@delete');
	Route::get('/admin/pesticides/edit/{id}', 'PesticidesController@edit');
	Route::post('/admin/pesticides/update/{id}', 'PesticidesController@update');
	Route::get('/admin/pesticides/add', 'PesticidesController@create');
	Route::post('/admin/add/pesticides', 'PesticidesController@store');
	//Admin Settings
	Route::get('/admin/profile', 'AdminController@profile');
	Route::get('/admin/profile/update', 'AdminController@profileEdit');
	Route::post('/admin/profile/update', 'AdminController@profileUpdate');

});


// Route::get('/admin',function() {
// 	return view('backend/index');
// });

// Route::get('/admin/login', function() {
// 	return view('backend/login');
// });





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
