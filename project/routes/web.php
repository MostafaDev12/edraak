<?php


 // ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------
 Route::get('/mode/{id}', 'Admin\DashboardController@mode')->name('admin.mode');

  //------------ ADMIN NOTIFICATION SECTION ------------


  //------------ ADMIN NOTIFICATION SECTION ENDS ------------

  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
  Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
  Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------




  

  
  

  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:general_settings'],function(){

  Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
  Route::get('/general-settings/blocks/icon', 'Admin\GeneralSettingController@blockIcon')->name('admin-gs-block'); 
  Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
  Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
  Route::get('/general-settings/Adminloader', 'Admin\GeneralSettingController@load2')->name('admin-gs-load2');
  Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
  Route::get('/general-settings/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');
  Route::get('/general-settings/header','Admin\GeneralSettingController@header')->name('admin-gs-header');
  Route::get('/general-settings/accept','Admin\GeneralSettingController@accept')->name('admin-gs-accept');
  Route::get('/general-settings/bank','Admin\GeneralSettingController@bank')->name('admin-gs-bankmasr');
  Route::get('/general-settings/nbe','Admin\GeneralSettingController@nbe')->name('admin-gs-nbe');
  Route::get('/general-settings/thawani','Admin\GeneralSettingController@thwani')->name('admin-gs-thawani');
  Route::get('/general-settings/fawry', 'Admin\GeneralSettingController@fawry')->name('admin-gs-fawry');
  Route::get('/general-settings/fatora','Admin\GeneralSettingController@fatora')->name('admin-gs-fatora');
  Route::get('/general-settings/paypal', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');

  Route::get('/general-settings/affilate', 'Admin\GeneralSettingController@affilate')->name('admin-gs-affilate');
  Route::get('/general-settings/error-banner', 'Admin\GeneralSettingController@errorbanner')->name('admin-gs-error-banner');
  Route::get('/general-settings/popup', 'Admin\GeneralSettingController@popup')->name('admin-gs-popup');
  Route::get('/general-settings/maintenance', 'Admin\GeneralSettingController@maintain')->name('admin-gs-maintenance');
  //------------ ADMIN PICKUP LOACTION ------------

  Route::get('/pickup/datatables', 'Admin\PickupController@datatables')->name('admin-pick-datatables'); //JSON REQUEST
  Route::get('/pickup', 'Admin\PickupController@index')->name('admin-pick-index');
  Route::get('/pickup/create', 'Admin\PickupController@create')->name('admin-pick-create');
  Route::post('/pickup/create', 'Admin\PickupController@store')->name('admin-pick-store');
  Route::get('/pickup/edit/{id}', 'Admin\PickupController@edit')->name('admin-pick-edit');
  Route::post('/pickup/edit/{id}', 'Admin\PickupController@update')->name('admin-pick-update');
  Route::get('/pickup/delete/{id}', 'Admin\PickupController@destroy')->name('admin-pick-delete');

  //------------ ADMIN PICKUP LOACTION ENDS ------------

  //------------ ADMIN SHIPPING ------------

  Route::get('/shipping/datatables', 'Admin\ShippingController@datatables')->name('admin-shipping-datatables');
  Route::get('/shipping', 'Admin\ShippingController@index')->name('admin-shipping-index');
  Route::get('/shipping/create', 'Admin\ShippingController@create')->name('admin-shipping-create');
  Route::post('/shipping/create', 'Admin\ShippingController@store')->name('admin-shipping-store');
  Route::get('/shipping/edit/{id}', 'Admin\ShippingController@edit')->name('admin-shipping-edit');
  Route::post('/shipping/edit/{id}', 'Admin\ShippingController@update')->name('admin-shipping-update');
  Route::get('/shipping/delete/{id}', 'Admin\ShippingController@destroy')->name('admin-shipping-delete');

  //------------ ADMIN SHIPPING ENDS ------------ 
  
  

  
  
  //------------ ADMIN SHIPMENTS PRICE------------

  Route::get('/shipment/price/datatables', 'Admin\ShipmentPriceController@datatables')->name('admin-shipment-price-datatables');
  Route::get('/shipment/price', 'Admin\ShipmentPriceController@index')->name('admin-shipment-price-index');
  Route::get('/shipment/price/create', 'Admin\ShipmentPriceController@create')->name('admin-shipment-price-create');
  Route::post('/shipment/price/create', 'Admin\ShipmentPriceController@store')->name('admin-shipment-price-store');
  Route::get('/shipment/price/edit/{id}', 'Admin\ShipmentPriceController@edit')->name('admin-shipment-price-edit');
  Route::post('/shipment/price/edit/{id}', 'Admin\ShipmentPriceController@update')->name('admin-shipment-price-update');
  Route::get('/shipment/price/delete/{id}', 'Admin\ShipmentPriceController@destroy')->name('admin-shipment-price-delete');

  //------------ ADMIN SHIPMENTS ENDS ------------

  //------------ ADMIN ZONES  ------------

  Route::get('/zones/datatables', 'Admin\ShipmentZoneController@datatables')->name('admin-zones-datatables');
  Route::get('/zones', 'Admin\ShipmentZoneController@index')->name('admin-zones-index');
  Route::get('/zones/create', 'Admin\ShipmentZoneController@create')->name('admin-zones-create');
  Route::post('/zones/store', 'Admin\ShipmentZoneController@store')->name('admin-zones-store');
  Route::get('/zones/edit/{id}', 'Admin\ShipmentZoneController@edit')->name('admin-zones-edit');
  Route::post('/zones/edit/{id}', 'Admin\ShipmentZoneController@update')->name('admin-zones-update');
  Route::get('/zones/delete/{id}', 'Admin\ShipmentZoneController@destroy')->name('admin-zones-delete');
  
  
  Route::get('/zones/city/create', 'Admin\ShipmentZoneController@citycreate')->name('admin-city-zone-create');
  Route::post('/zones/city/store', 'Admin\ShipmentZoneController@citystore')->name('admin-city-zone--store');
  
  Route::get('/zones/city/{id}', 'Admin\ShipmentZoneController@city')->name('admin-city-zone-index');
  Route::get('/zones/city/delete/{id}', 'Admin\ShipmentZoneController@citydelete')->name('admin-zones-delete-city');
  //------------ ADMIN ZONES ENDS ------------ 






  //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------

  // General Setting Section
  Route::get('/general-settings/home/{status}', 'Admin\GeneralSettingController@ishome')->name('admin-gs-ishome');
  Route::get('/general-settings/shop/{status}', 'Admin\GeneralSettingController@isshop')->name('admin-gs-isshop');
  Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus');
  Route::get('/general-settings/allowzip/{status}', 'Admin\GeneralSettingController@allowZip')->name('admin-gs-allowzip');
  Route::get('/general-settings/allowshipto/{status}', 'Admin\GeneralSettingController@allowShipTo')->name('admin-gs-allowshipto');
  Route::get('/general-settings/allowpickup/{status}', 'Admin\GeneralSettingController@allowPickup')->name('admin-gs-allowpickup');
  Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
  Route::get('/general-settings/email-verify/{status}', 'Admin\GeneralSettingController@isemailverify')->name('admin-gs-is-email-verify');
  Route::get('/general-settings/popup/{status}', 'Admin\GeneralSettingController@ispopup')->name('admin-gs-ispopup');

  Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader');
  Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
  Route::get('/general-settings/drift/{status}', 'Admin\GeneralSettingController@drift')->name('admin-gs-drift');
  Route::get('/general-settings/messenger/{status}', 'Admin\GeneralSettingController@messenger')->name('admin-gs-messenger');

  Route::get('/general-settings/multiple/shipping/{status}', 'Admin\GeneralSettingController@mship')->name('admin-gs-mship');
  Route::get('/general-settings/multiple/shipment/{status}', 'Admin\GeneralSettingController@shipment')->name('admin-gs-shipment');
  Route::get('/general-settings/multiple/packaging/{status}', 'Admin\GeneralSettingController@mpackage')->name('admin-gs-mpackage');
  Route::get('/general-settings/security/{status}', 'Admin\GeneralSettingController@issecure')->name('admin-gs-secure');
  Route::get('/general-settings/stock/{status}', 'Admin\GeneralSettingController@stock')->name('admin-gs-stock');
  Route::get('/general-settings/maintain/{status}', 'Admin\GeneralSettingController@ismaintain')->name('admin-gs-maintain');
  //  Affilte Section

  Route::get('/general-settings/affilate/{status}', 'Admin\GeneralSettingController@isaffilate')->name('admin-gs-isaffilate');

  //  Capcha Section

  Route::get('/general-settings/capcha/{status}', 'Admin\GeneralSettingController@iscapcha')->name('admin-gs-iscapcha');


  //------------ ADMIN GENERAL SETTINGS JSON SECTION ENDS------------


  Route::get('/subscribes/datatables', 'Admin\SubscribesController@datatables')->name('admin-subscribes-datatables'); //JSON REQUEST
  Route::get('/subscribe', 'Admin\SubscribesController@index')->name('admin-subscribes-index');
  Route::get('/subscribes/create', 'Admin\SubscribesController@create')->name('admin-subscribes-create');
  Route::post('/subscribes/create', 'Admin\SubscribesController@store')->name('admin-subscribes-store');
  Route::get('/subscribes/edit/{id}', 'Admin\SubscribesController@edit')->name('admin-subscribes-edit');
  Route::post('/subscribes/edit/{id}', 'Admin\SubscribesController@update')->name('admin-subscribes-update');
  Route::get('/subscribes/delete/{id}', 'Admin\SubscribesController@destroy')->name('admin-subscribes-delete');
  Route::get('/subscribes/status/{id1}/{id2}', 'Admin\SubscribesController@status')->name('admin-subscribes-status');

  });

  //------------ ADMIN GENERAL SETTINGS SECTION ENDS ------------


  Route::get('/subscription/datatables', 'Admin\SubscriptionController@datatables')->name('admin-subscription-datatables');
  Route::get('/subscription', 'Admin\SubscriptionController@index')->name('admin-subscription-index');
  Route::get('/subscription/create', 'Admin\SubscriptionController@create')->name('admin-subscription-create');
  Route::post('/subscription/create', 'Admin\SubscriptionController@store')->name('admin-subscription-store');
  Route::get('/subscription/edit/{id}', 'Admin\SubscriptionController@edit')->name('admin-subscription-edit');
  Route::post('/subscription/edit/{id}', 'Admin\SubscriptionController@update')->name('admin-subscription-update');
  Route::get('/subscription/delete/{id}', 'Admin\SubscriptionController@destroy')->name('admin-subscription-delete');


  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:emails_settings'],function(){

  Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
  Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
  Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

});

  
 Route::group(['middleware'=>'permissions:contact_us'],function(){

  Route::get('/page-settings/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
 Route::post('/page-settings/update/contact', 'Admin\PageSettingController@contactupdate')->name('admin-ps-updates');
});

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------



    Route::get('/category/datatables', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
    Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
    
      Route::get('/product/category/datatables', 'Admin\CategoryController@productdatatables')->name('admin-product-cat-datatables'); //JSON REQUEST
    Route::get('product/category', 'Admin\CategoryController@productindex')->name('admin-product-cat-index');
    
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
    Route::get('/category/productcreate', 'Admin\CategoryController@productcreate')->name('admin-product-cat-create');
    Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
    Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
    Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');

    Route::post('/category/deactivate', 'Admin\CategoryController@ckeckall')->name('admin-cat-all');
    Route::post('/category/activate', 'Admin\CategoryController@ckeckactivate')->name('admin-cat-activate');
    Route::post('/category/deleted', 'Admin\CategoryController@ckeckdelete')->name('admin-cat-deleted');


    //------------ ADMIN ATTRIBUTE SECTION ------------

    Route::get('/attribute/datatables', 'Admin\AttributeController@datatables')->name('admin-attr-datatables'); //JSON REQUEST
    Route::get('/attribute', 'Admin\AttributeController@index')->name('admin-attr-index');
    Route::get('/attribute/{catid}/attrCreateForCategory', 'Admin\AttributeController@attrCreateForCategory')->name('admin-attr-createForCategory');
    Route::get('/attribute/{subcatid}/attrCreateForSubcategory', 'Admin\AttributeController@attrCreateForSubcategory')->name('admin-attr-createForSubcategory');
    Route::get('/attribute/{childcatid}/attrCreateForChildcategory', 'Admin\AttributeController@attrCreateForChildcategory')->name('admin-attr-createForChildcategory');
    Route::post('/attribute/store', 'Admin\AttributeController@store')->name('admin-attr-store');
    Route::get('/attribute/{id}/manage', 'Admin\AttributeController@manage')->name('admin-attr-manage');
    Route::get('/attribute/{attrid}/edit', 'Admin\AttributeController@edit')->name('admin-attr-edit');
    Route::post('/attribute/edit/{id}', 'Admin\AttributeController@update')->name('admin-attr-update');
    Route::get('/attribute/{id}/options', 'Admin\AttributeController@options')->name('admin-attr-options');
    Route::get('/attribute/delete/{id}', 'Admin\AttributeController@destroy')->name('admin-attr-delete');

  //------------ ADMIN PAYMENT SETTINGS SECTION ------------

    //------------ ADMIN Careers SECTION ------------


        Route::get('/Careers/datatables', 'Admin\CareerController@datatables')->name('admin-prod-datatables'); //JSON REQUEST
        Route::get('/Careers', 'Admin\CareerController@index')->name('admin-prod-index');

        Route::post('/Careers/upload/update/{id}', 'Admin\CareerController@uploadUpdate')->name('admin-prod-upload-update');

        Route::get('/Careers/deactive/datatables', 'Admin\CareerController@deactivedatatables')->name('admin-prod-deactive-datatables'); //JSON REQUEST
        Route::get('/Careers/deactive', 'Admin\CareerController@deactive')->name('admin-prod-deactive');


        Route::get('/Careers/catalogs/datatables', 'Admin\CareerController@catalogdatatables')->name('admin-prod-catalog-datatables'); //JSON REQUEST
        Route::get('/Careers/catalogs/', 'Admin\CareerController@catalogs')->name('admin-prod-catalog-index');

        // CREATE SECTION
        Route::get('/Careers/types', 'Admin\CareerController@types')->name('admin-prod-types');
        Route::get('/Careers/physical/create', 'Admin\CareerController@createPhysical')->name('admin-prod-physical-create');
        Route::get('/Careers/digital/create', 'Admin\CareerController@createDigital')->name('admin-prod-digital-create');
        Route::get('/Careers/license/create', 'Admin\CareerController@createLicense')->name('admin-prod-license-create');
        Route::post('/Careers/store', 'Admin\CareerController@store')->name('admin-prod-store');
        Route::get('/getattributes', 'Admin\CareerController@getAttributes')->name('admin-prod-getattributes');
        // CREATE SECTION

        // EDIT SECTION
        Route::get('/Careers/edit/{id}', 'Admin\CareerController@edit')->name('admin-prod-edit');
        Route::post('/Careers/edit/{id}', 'Admin\CareerController@update')->name('admin-prod-update');

        // EDIT SECTION ENDS

// STATUS SECTION
    Route::get('/Careers/status/{id1}/{id2}', 'Admin\ProductController@status')->name('admin-prod-status');
    // STATUS SECTION ENDS

        // DELETE SECTION
        Route::get('/Careers/delete/{id}', 'Admin\CareerController@destroy')->name('admin-prod-delete');
        Route::get('/related/delete/{id}', 'Admin\CareerController@relateddelete')->name('admin-related-delete');
        // DELETE SECTION ENDS


        Route::get('/Careers/catalog/{id1}/{id2}', 'Admin\CareerController@catalog')->name('admin-prod-catalog');


        Route::post('/Careers/deactivate', 'Admin\CareerController@ckeckall')->name('admin-prod-all');
        Route::post('/Careers/activate', 'Admin\CareerController@ckeckactivate')->name('admin-prod-activate');
        Route::post('/Careers/deleted', 'Admin\CareerController@ckeckdelete')->name('admin-prod-deleted');
        Route::post('/Careers/catalog/all', 'Admin\CareerController@ckeckcatalog')->name('admin-pro-catalog');
        Route::get('/Careers/features/all', 'Admin\CareerController@ckeckfeature')->name('admin-pro-feature');
        Route::post('/Careers/features/alls', 'Admin\CareerController@ckeckfeatures')->name('admin-pro-features');



    //------------ ADMIN Products SECTION ------------


        Route::get('/Products/datatables', 'Admin\ProductController@datatables')->name('admin-product-datatables'); //JSON REQUEST
        Route::get('/Products', 'Admin\ProductController@index')->name('admin-product-index');

        Route::post('/Products/upload/update/{id}', 'Admin\ProductController@uploadUpdate')->name('admin-product-upload-update');

        Route::get('/Products/deactive/datatables', 'Admin\ProductController@deactivedatatables')->name('admin-product-deactive-datatables'); //JSON REQUEST
        Route::get('/Products/deactive', 'Admin\ProductController@deactive')->name('admin-product-deactive');


        Route::get('/Products/catalogs/datatables', 'Admin\ProductController@catalogdatatables')->name('admin-product-catalog-datatables'); //JSON REQUEST
        Route::get('/Products/catalogs/', 'Admin\ProductController@catalogs')->name('admin-product-catalog-index');

        // CREATE SECTION
        Route::get('/Products/types', 'Admin\ProductController@types')->name('admin-product-types');
        Route::get('/Products/physical/create', 'Admin\ProductController@createPhysical')->name('admin-product-physical-create');
        Route::get('/Products/digital/create', 'Admin\ProductController@createDigital')->name('admin-product-digital-create');
        Route::get('/Products/license/create', 'Admin\ProductController@createLicense')->name('admin-product-license-create');
        Route::post('/Products/store', 'Admin\ProductController@store')->name('admin-product-store');
   
        // CREATE SECTION

        // EDIT SECTION
        Route::get('/Products/edit/{id}', 'Admin\ProductController@edit')->name('admin-product-edit');
        Route::post('/Products/edit/{id}', 'Admin\ProductController@update')->name('admin-product-update');

        // EDIT SECTION ENDS

// STATUS SECTION
    Route::get('/Products/status/{id1}/{id2}', 'Admin\ProductController@status')->name('admin-product-status');
    // STATUS SECTION ENDS

        // DELETE SECTION
        Route::get('/Products/delete/{id}', 'Admin\ProductController@destroy')->name('admin-product-delete');
     
        // DELETE SECTION ENDS


        Route::get('/Products/catalog/{id1}/{id2}', 'Admin\ProductController@catalog')->name('admin-product-catalog');


        Route::post('/Products/deactivate', 'Admin\ProductController@ckeckall')->name('admin-product-all');
        Route::post('/Products/activate', 'Admin\ProductController@ckeckactivate')->name('admin-product-activate');
        Route::post('/Products/deleted', 'Admin\ProductController@ckeckdelete')->name('admin-product-deleted');
        Route::post('/Products/catalog/all', 'Admin\ProductController@ckeckcatalog')->name('admin-product-catalog');
        Route::get('/Products/features/all', 'Admin\ProductController@ckeckfeature')->name('admin-product-feature');
        Route::post('/Products/features/alls', 'Admin\ProductController@ckeckfeatures')->name('admin-product-features');





     

    Route::get('/load/subcategories/{id}/', 'Admin\CareerController@load')->name('admin-subcat-load'); //JSON REQUEST

        //------------ ADMIN Careers SECTION ENDS------------


        Route::group(['middleware'=>'permissions:payment_settings'],function(){



  // MULTIPLE CURRENCY

  Route::get('/general-settings/currency/{status}', 'Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency');
  Route::get('/currency/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
  Route::get('/currency', 'Admin\CurrencyController@index')->name('admin-currency-index');
  Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin-currency-create');
  Route::post('/currency/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
  Route::get('/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit');
  Route::post('/currency/update/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
  Route::get('/currency/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete');
  Route::get('/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status');

});

  //------------ ADMIN PAYMENT SETTINGS SECTION ENDS------------


//----------------- COUNTRY ----------------------------------

    Route::get('/country/datatables', 'Admin\CountryController@datatables')->name('admin-country-datatables'); //JSON REQUEST

    Route::get('/country', 'Admin\CountryController@index2')->name('admin-country-index2');
    Route::get('/country/create', 'Admin\CountryController@create')->name('admin-country-create');
    Route::post('/country/create', 'Admin\CountryController@store')->name('admin-country-store');
    Route::get('/country/edit/{id}', 'Admin\CountryController@edit')->name('admin-country-edit');
    Route::post('/country/edit/{id}', 'Admin\CountryController@update')->name('admin-country-update');
    Route::get('/country/delete/{id}', 'Admin\CountryController@destroy')->name('admin-country-delete');
    Route::get('/country/status/{id1}/{id2}', 'Admin\CountryController@status')->name('admin-country-status');
    Route::get('/country/default/{id1}/{id2}', 'Admin\CountryController@Default')->name('admin-country-default');

    Route::post('/country/deactivate', 'Admin\CountryController@ckeckall')->name('admin-country-all');
    Route::post('/country/activate', 'Admin\CountryController@ckeckactivate')->name('admin-country-activate');
    Route::post('/country/deleted', 'Admin\CountryController@ckeckdelete')->name('admin-country-deleted');

    //----------------- CITY ----------------------------------

    Route::get('/city/datatables', 'Admin\CityController@datatables')->name('admin-city-datatables'); //JSON REQUEST
    Route::get('/city', 'Admin\CityController@index')->name('admin-city-index');
    Route::get('/city/create', 'Admin\CityController@create')->name('admin-city-create');
    Route::post('/city/create', 'Admin\CityController@store')->name('admin-city-store');
    Route::get('/city/edit/{id}', 'Admin\CityController@edit')->name('admin-city-edit');
    Route::post('/city/edit/{id}', 'Admin\CityController@update')->name('admin-city-update');
    Route::get('/city/delete/{id}', 'Admin\CityController@destroy')->name('admin-city-delete');
    Route::get('/city/status/{id1}/{id2}', 'Admin\CityController@status')->name('admin-city-status');


    Route::post('/city/deactivate', 'Admin\CityController@ckeckall')->name('admin-city-all');
    Route::post('/city/activate', 'Admin\CityController@ckeckactivate')->name('admin-city-activate');
    Route::post('/city/deleted', 'Admin\CityController@ckeckdelete')->name('admin-city-deleted');

//----------------- Program ----------------------------------

    Route::get('/program/datatables', 'Admin\ProgramController@datatables')->name('admin-program-datatables'); //JSON REQUEST

    Route::get('/program', 'Admin\ProgramController@index2')->name('admin-program-index2');
    Route::get('/program/create', 'Admin\ProgramController@create')->name('admin-program-create');
    Route::post('/program/create', 'Admin\ProgramController@store')->name('admin-program-store');
    Route::get('/program/edit/{id}', 'Admin\ProgramController@edit')->name('admin-program-edit');
    Route::post('/program/edit/{id}', 'Admin\ProgramController@update')->name('admin-program-update');
    Route::get('/program/delete/{id}', 'Admin\ProgramController@destroy')->name('admin-program-delete');
    Route::get('/program/status/{id1}/{id2}', 'Admin\ProgramController@status')->name('admin-program-status');


    Route::post('/program/deactivate', 'Admin\ProgramController@ckeckall')->name('admin-program-all');
    Route::post('/program/activate', 'Admin\ProgramController@ckeckactivate')->name('admin-program-activate');
    Route::post('/program/deleted', 'Admin\ProgramController@ckeckdelete')->name('admin-program-deleted');

    //----------------- Content ----------------------------------

    Route::get('/Content/datatables', 'Admin\ContentController@datatables')->name('admin-Content-datatables'); //JSON REQUEST
    Route::get('/Content', 'Admin\ContentController@index')->name('admin-Content-index');
    Route::get('/Content/create', 'Admin\ContentController@create')->name('admin-Content-create');
    Route::post('/Content/create', 'Admin\ContentController@store')->name('admin-Content-store');
    Route::get('/Content/edit/{id}', 'Admin\ContentController@edit')->name('admin-Content-edit');
    Route::post('/Content/edit/{id}', 'Admin\ContentController@update')->name('admin-Content-update');
    Route::get('/Content/delete/{id}', 'Admin\ContentController@destroy')->name('admin-Content-delete');
    Route::get('/Content/status/{id1}/{id2}', 'Admin\ContentController@status')->name('admin-Content-status');

 //----------------- Page ----------------------------------

    Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
    Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
    Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
    Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
    Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
    Route::post('/page/edit/{id}', 'Admin\PageController@update')->name('admin-page-update');
    Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
    Route::get('/page/status/{id1}/{id2}', 'Admin\PageController@status')->name('admin-page-status');


    Route::post('/page/deactivate', 'Admin\PageController@ckeckall')->name('admin-page-all');
    Route::post('/page/activate', 'Admin\PageController@ckeckactivate')->name('admin-page-activate');
    Route::post('/page/deleted', 'Admin\PageController@ckeckdelete')->name('admin-page-deleted');

//----------------- jobs ----------------------------------

    Route::get('/applied/datatables', 'Admin\ApplyController@datatables')->name('admin-applied-datatables'); //JSON REQUEST
    Route::get('/applied', 'Admin\ApplyController@index')->name('admin-applied-index');
    Route::get('/applied/delete/{id}', 'Admin\ApplyController@destroy')->name('admin-applied-delete');
    Route::get('/applied/show/{id}', 'Admin\ApplyController@show')->name('admin-applied-show');

//----------------- contacts ----------------------------------

    Route::get('/contacts/datatables', 'Admin\ContactController@datatables')->name('admin-Contact-datatables'); //JSON REQUEST
    Route::get('/contacts', 'Admin\ContactController@index')->name('admin-Contact-index');
    Route::get('/contacts/delete/{id}', 'Admin\ContactController@destroy')->name('admin-Contact-delete');
    Route::get('/contacts/show/{id}', 'Admin\ContactController@show')->name('admin-Contact-show');

//----------------- Support ----------------------------------

    Route::get('/Support/datatables', 'Admin\SupportController@datatables')->name('admin-Support-datatables'); //JSON REQUEST
    Route::get('/Support', 'Admin\SupportController@index')->name('admin-Support-index');
    Route::get('/Support/delete/{id}', 'Admin\SupportController@destroy')->name('admin-Support-delete');
    Route::get('/Support/show/{id}', 'Admin\SupportController@show')->name('admin-Support-show');





  //------------ ADMIN SOCIAL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:social_settings'],function(){

  Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
  Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');
  Route::get('/social/facebook', 'Admin\SocialSettingController@facebook')->name('admin-social-facebook');
  Route::get('/social/google', 'Admin\SocialSettingController@google')->name('admin-social-google');
  Route::get('/social/facebook/{status}', 'Admin\SocialSettingController@facebookup')->name('admin-social-facebookup');
  Route::get('/social/google/{status}', 'Admin\SocialSettingController@googleup')->name('admin-social-googleup');


});
  //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------



  //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:language_settings'],function(){

  //  Multiple Language Section

  Route::get('/general-settings/language/{status}', 'Admin\GeneralSettingController@language')->name('admin-gs-islanguage');

  //  Multiple Language Section Ends

  Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
  Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
  Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
  Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
  Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
  Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');
  Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
  Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');


  //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ------------

  Route::get('/adminlanguages/datatables', 'Admin\AdminLanguageController@datatables')->name('admin-tlang-datatables'); //JSON REQUEST
  Route::get('/adminlanguages', 'Admin\AdminLanguageController@index')->name('admin-tlang-index');
  Route::get('/adminlanguages/create', 'Admin\AdminLanguageController@create')->name('admin-tlang-create');
  Route::get('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@edit')->name('admin-tlang-edit');
  Route::post('/adminlanguages/create', 'Admin\AdminLanguageController@store')->name('admin-tlang-store');
  Route::post('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@update')->name('admin-tlang-update');
  Route::get('/adminlanguages/status/{id1}/{id2}', 'Admin\AdminLanguageController@status')->name('admin-tlang-st');
  Route::get('/adminlanguages/delete/{id}', 'Admin\AdminLanguageController@destroy')->name('admin-tlang-delete');

  //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ENDS ------------

  //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------

 



  });



  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:seo_tools'],function(){

  Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  Route::get('/services/popular/{id}','Admin\SeoToolController@popular')->name('admin-prod-popular');
  
   Route::get('/homepage/meta','Admin\SeoToolController@homeMeta')->name('admin-home-meta');
     Route::get('/homepage/header','Admin\SeoToolController@homePageHeader')->name('admin-homepage-header');
    Route::get('/product/header','Admin\SeoToolController@productHeader')->name('admin-product-header');
    Route::get('/category/header','Admin\SeoToolController@categoryHeader')->name('admin-category-header');
    Route::get('/offer/header','Admin\SeoToolController@offerHeader')->name('admin-offer-header');
     Route::get('/brand/header','Admin\SeoToolController@brandHeader')->name('admin-brand-header');
     Route::get('/subcategory/header','Admin\SeoToolController@subcategoryHeader')->name('admin-subcategory-header');
    
    Route::get('/childcategory/header','Admin\SeoToolController@childcategoryHeader')->name('admin-childcategory-header');

  });

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  //------------ ADMIN STAFF SECTION ------------

  Route::group(['middleware'=>'permissions:manage_staffs'],function(){

  Route::get('/staff/datatables', 'Admin\StaffController@datatables')->name('admin-staff-datatables');
  Route::get('/staff', 'Admin\StaffController@index')->name('admin-staff-index');
  Route::get('/staff/create', 'Admin\StaffController@create')->name('admin-staff-create');
  Route::post('/staff/create', 'Admin\StaffController@store')->name('admin-staff-store');
  Route::get('/staff/edit/{id}', 'Admin\StaffController@edit')->name('admin-staff-edit');
  Route::post('/staff/update/{id}', 'Admin\StaffController@update')->name('admin-staff-update');
  Route::get('/staff/show/{id}', 'Admin\StaffController@show')->name('admin-staff-show');
  Route::get('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('admin-staff-delete');

  });

  //------------ ADMIN STAFF SECTION ENDS------------

  //------------ ADMIN SUBSCRIBERS SECTION ------------

  Route::group(['middleware'=>'permissions:subscribers'],function(){

  Route::get('/subscribers/datatables', 'Admin\SubscriberController@datatables')->name('admin-subs-datatables'); //JSON REQUEST
  Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'Admin\SubscriberController@download')->name('admin-subs-download');

  });

  //------------ ADMIN SUBSCRIBERS ENDS ------------

// ------------ GLOBAL ----------------------
  Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
  Route::post('/general-settings/update/photo', 'Admin\GeneralSettingController@photoupdate')->name('admin-photo-update');
  Route::post('/general-settings/update/payment', 'Admin\GeneralSettingController@generalupdatepayment')->name('admin-gs-update-payment');



  Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/home', 'Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');

// ------------ GLOBAL ENDS ----------------------

Route::group(['middleware'=>'permissions:super'],function(){



  Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('admin.dashboard')->with('cache','System Cache Has Been Removed.');
  })->name('admin-cache-clear');

  Route::get('/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
  Route::get('/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
  Route::get('/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
  Route::post('/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
  Route::get('/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');
  
  // ------------ ROLE SECTION ----------------------

  Route::get('/role/datatables', 'Admin\RoleController@datatables')->name('admin-role-datatables');
  Route::get('/role', 'Admin\RoleController@index')->name('admin-role-index');
  Route::get('/role/create', 'Admin\RoleController@create')->name('admin-role-create');
  Route::post('/role/create', 'Admin\RoleController@store')->name('admin-role-store');
  Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('admin-role-edit');
  Route::post('/role/edit/{id}', 'Admin\RoleController@update')->name('admin-role-update');
  Route::get('/role/delete/{id}', 'Admin\RoleController@destroy')->name('admin-role-delete');

  // ------------ ROLE SECTION ENDS ----------------------


  });


});


// ************************************ ADMIN SECTION ENDS**********************************************




Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', 'Front\FrontendController@finalize');

Route::get('/under-maintenance', 'Front\FrontendController@maintenance')->name('front-maintenance');
Route::get('/under-susbends', 'Front\FrontendController@susbend')->name('front-susbend');
Route::get('/under-susbend', 'Front\FrontendController@userpay')->name('front-userpay');


  Route::group(['middleware'=>'maintenance'],function(){



// ************************************ FRONT SECTION **********************************************




 /*Route::get('/', function(){
     
    $data = DB::table('languages')->where('is_default','=',1)->first();
    
     return Redirect::to('/'.$data->sign);
       
});*/


  Route::get('/', 'Front\FrontendController@index')->name('front.index');
  
  Route::get('/extras', 'Front\FrontendController@extraIndex')->name('front.extraIndex');
  Route::get('/currency/{id}', 'Front\FrontendController@currency')->name('front.currency');
  Route::get('/language/{id}', 'Front\FrontendController@language')->name('front.language');

      Route::get('careers','Front\FrontendController@careers')->name('front.careers');

      Route::get('apply_job/{id}','Front\FrontendController@apply_job')->name('front.apply.job');
      Route::post('applied_job','Front\FrontendController@applied_job')->name('front.applied.job');

  // support SECTION


  Route::get('Customer-support','Front\FrontendController@technical_support')->name('front.support');
  Route::post('/technical-support','Front\FrontendController@supportemail')->name('front.support.submit');

      // CONTACT SECTION
  Route::get('contact','Front\FrontendController@contact')->name('front.contact');
  Route::post('/contact','Front\FrontendController@contactemail')->name('front.contact.submit');

 Route::get('products','Front\FrontendController@products')->name('front.products');
 
 Route::get('product/{slug}','Front\FrontendController@product')->name('front.product');
 
 //new
  Route::post('products-form','Front\FrontendController@productsForm')->name('front.products-form');
 Route::post('/products-submit','Front\FrontendController@productemail')->name('front.product.submit');

 Route::post('product-prices','Front\FrontendController@productPrices')->name('front.product-prices');
 Route::post('product-types','Front\FrontendController@productTypes')->name('front.product-types');
 
 
//
 
Route::get('/cloud', function () {
    return view('front.cloud');
});
Route::get('/it-service-management', function () {
    return view('front.it-service-management');
});
Route::get('/system-integration', function () {
    return view('front.system-integration');
});
Route::get('/it-infrastructure', function () {
    return view('front.it-infrastructure');
});
Route::get('/crm', function () {
    return view('front.crm');
});
Route::get('/mobile', function () {
    return view('front.mobile');
});
Route::get('/website', function () {
    return view('front.website');
});
Route::get('/erp', function () {
    return view('front.erp');
});
Route::get('/oracle', function () {
    return view('front.oracle');
});
Route::get('/wso2', function () {
    return view('front.wso2');
});
  Route::get('contact/refresh_code','Front\FrontendController@refresh_code');
  // CONTACT SECTION  ENDS


      Route::post('cities' , 'Front\FrontendController@cities');
      Route::post('pages' , 'Front\FrontendController@pages');

  // SUBSCRIBE SECTION

  Route::post('/subscriber/store', 'Front\FrontendController@subscribe')->name('front.subscribe');

  // SUBSCRIBE SECTION ENDS



  //  CRONJOB
  Route::get('/vendor/subscription/check','Front\FrontendController@subcheck');

  // CRONJOB ENDS


// ************************************ FRONT SECTION ENDS**********************************************


  

  });

