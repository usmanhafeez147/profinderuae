<?php

Auth::routes();

Route::group(['middleware' => 'web'],function(){
	
	/*Route::get('check',function(){
		$fields=\App\Models\CustomField::all();
		return view('emailconfirm',['fields'=>$fields]);
	});*/
	
	//Basic Routes
	Route::get('/','HomeController@index')->name('home');
	Route::get('/about','HomeController@about')->name('about');
	Route::get('/contact-us','HomeController@contactUs')->name('contactUs');
	Route::post('/email','EmailController@Email')->name('postEmail');
	
	//Companies Routes
	Route::get('/companies','HomeController@merchants')->name('merchants');
	Route::post('/companies/result/','HomeController@searchResult')->name('searchRes');
	Route::get('/companies/result/','HomeController@searchResult')->name('searchRes');
	Route::post('/companies/resultByNames/','HomeController@searchbyName')->name('searchbyName');
	Route::get('/companies/resultByNames/','HomeController@searchbyName')->name('searchbyName');
	/*Route::get('/companies/city/{cityId}','HomeController@merchantsByCity')->name('merchantsByCity');*/
	Route::get('/companies/category/{categoryId}','HomeController@merchantsByCategory')->name('merchantsByCategory');
	Route::get('/companies/details/{merchantId}','HomeController@merchantDetails')->name('merchantDetails');

	// Route that handles submission of review - rating/comment
	Route::post('companies/{id}','HomeController@rating')->name('rateCompany');

	Route::get('packages/list','HomeController@packages')->name('packages');
	Route::get('/products/category','HomeController@productsByCategory')->name('productsByCategory');
	Route::get('/products/details/{id}','HomeController@productDetails')->name('productDetails');
	
	Route::get('/categories','HomeController@offers')->name('offers');
	Route::get('/categories/alphabet/{alphabet}','HomeController@categories')->name('offersByAlphabet')->where('alphabet', '[A-Za-z]');

	Route::get('/news','HomeController@services')->name('services');
	Route::get('/news/details/{newsId}','HomeController@detailedNews')->name('detailedNews');
	Route::get('/news/details/{id}',"HomeController@newsDetails")->name('newsDetails');

	Route::get('/term-of-services','HomeController@termOfServices')->name('termOfServices');
	
	Route::get('/directories/city','HomeController@directories')->name('directories');
	Route::get('/directories/alphabet/{alphabet}/city/{city}','HomeController@directoriesByAlphabet')->name('directoriesByAlphabet')->where('alphabet', '[A-Za-z]');

	Route::get('directories/{id}/details','HomeController@directoryDetails')->name('directoryDetails');
	//
	
	Route::get('/logout','Company\LoginController@getLogout')->name('getLogout');
});


Route::group(['middleware' => 'company_guest'], function() {
	Route::get('/login','Company\LoginController@viewLoginForm')->name('viewLoginForm');
	Route::post('/login','Company\LoginController@postLoginForm')->name('postLoginForm');
	
	//this should not show when company is logged in
	Route::get('/register','Company\RegisterController@viewRegisterForm')->name('viewRegisterForm');
	Route::post('/register','Company\RegisterController@postRegisterForm')->name('postRegisterForm');
	Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
	
	//Password reset routes
	Route::get('company_password/reset', 'Company\ForgotPasswordController@showLinkRequestForm')->name('resetPassword');
	Route::post('company_password/email', 'Company\ForgotPasswordController@sendResetLinkEmail');
	Route::get('company_password/reset/{token}', 'Company\ResetPasswordController@showResetForm');
	Route::post('company_password/reset', 'Company\ResetPasswordController@reset');

});

Route::group(['prefix'=>'company','middleware'=>'company', 'namespace'=>'Company'],function(){
	
	//Company Console Dashboard
	Route::get('/dashboard','HomeController@index')->name('companyDashboard');
	
	//Get or set Company Profile
	Route::get('/companyProfile','HomeController@companyProfile')->name('companyProfile');
	Route::get('/edit/companyProfile','HomeController@editCompanyProfile')->name('editCompanyProfile');
	Route::post('/update/companyProfile','HomeController@updateCompanyProfile')->name('updateCompanyProfile');
	
	//Get all Products for Company
	Route::get('/products','ProductsController@index')->name('getProducts');
	
	//Add Products
	Route::get('/products/create','ProductsController@showForm')->name('createProducts');
	Route::post('/products/create','ProductsController@create')->name('createProducts');

	//Edit Product
	Route::get('/products/edit/{id}','ProductsController@showEditForm')->name('editProducts');
	//Update Product
	Route::post('/products/update/{id}','ProductsController@update')->name('updateProducts');
	Route::get('/product/delete/{id}','ProductsController@deleteProducts')->name('deleteProducts');

	//Get all Images for Company
	Route::get('/images','ImagesController@index')->name('getImages');
	
	//Add Images
	Route::get('/images/create','ImagesController@showForm')->name('createImages');
	Route::post('/images/create','ImagesController@create')->name('createImages');

	//Edit Image
	Route::get('/images/edit/{id}','ImagesController@showEditForm')->name('editImages');
	//Update Image
	Route::post('/images/update/{id}','ImagesController@update')->name('updateImages');

	Route::get('/images/delete/{id}','ImagesController@deleteImages')->name('deleteImages');

	//Get all keywords for company
	Route::get('/keywords','KeywordsController@index')->name('getKeywords');
	
	//Add Keywords
	Route::get('/keywords/create','KeywordsController@showForm')->name('createKeywords');
	Route::post('/keywords/create','KeywordsController@create')->name('createKeywords');

	//Edit Product
	Route::get('/keywords/edit/{id}','KeywordsController@showEditForm')->name('editKeywords');
	//Update Product
	Route::post('keywords/update/{id}','KeywordsController@update')->name('updateKeywords');

	Route::get('/keywords/delete/{id}','KeywordsController@deletekeywords')->name('deletekeywords');
});


//this is admin route group
Route::group(['prefix' => 'admin', 'middleware' =>'admin', 'namespace'=>'Admin'], function()
{
	Route::group(['middleware' => ['writer']], function()
	{
		CRUD::resource('company','CompanyCrudController');
		Route::get('company/details/{id}', 'CompanyCrudController@details');
		CRUD::resource('city','CityCrudController');
		CRUD::resource('package','PackageCrudController');
		CRUD::resource('order','OrderCrudController');
		CRUD::resource('news','NewsCrudController');
		CRUD::resource('/sliderphoto','SliderPhotoCrudController');
		CRUD::resource('/audio','AudioCrudController');
		CRUD::resource('/video','VideoCrudController');
		CRUD::resource('/image','ImageCrudController');
		CRUD::resource('/customfield','CustomFieldCrudController');
		CRUD::resource('/consumer','ConsumerCrudController');
		Route::get('/consumers/import', 'ConsumerCrudController@importExport');
		Route::post('importExcel', 'ConsumerCrudController@importExcel')->name('importExcel');
		CRUD::resource('/product','ProductCrudController');
		
		CRUD::resource('/order','OrderCrudController');
		Route::get('order/details/{id}', 'OrderCrudController@details');
		//Print Specific Order
		Route::get('/order/{id}/print','OrderCrudController@printOrder');
		//Order Report Basis
		Route::get('/orders/daily-report','OrderCrudController@getDailyReport');
		Route::get('/orders/weekly-report','OrderCrudController@getWeeklyReport');
		Route::get('/orders/monthly-report','OrderCrudController@getMonthlyReport');


		CRUD::resource('/invoice','InvoiceCrudController');
		Route::get('invoice/details/{id}', 'InvoiceCrudController@details');
		//Print Specific Invoice
		Route::get('invoice/{id}/print','InvoiceCrudController@printInvoice');
		//Invoice Report Basis
		Route::get('/invoices/daily-report','InvoiceCrudController@getDailyReport');
		Route::get('/invoices/weekly-report','InvoiceCrudController@getWeeklyReport');
		Route::get('/invoices/monthly-report','InvoiceCrudController@getMonthlyReport');

		//CRUD::resource('/subscription','SubscriptionCrudController');
		
	});

	
		CRUD::resource('/consumer','ConsumerCrudController');
		Route::get('/consumers/agent-report','ConsumerCrudController@lista');
		Route::get('/consumers/import', 'ConsumerCrudController@importExport');
		Route::post('importExcel', 'ConsumerCrudController@importExcel')->name('importExcel');
});

