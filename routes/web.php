<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;


/*
|--------------------------------------------------------------------------
| ProductController Routes
|--------------------------------------------------------------------------
|  
*/


//load product view
Route::get('/',[ProductController::class , 'Load_Product_View']);

//ad-product
Route::post('/add-product',[ProductController::class , 'Add_New_Product']);

//get-single-product
Route::post('/get-single-product',[ProductController::class , 'Get_Single_Product']);

//update-product-record
Route::post('/update-product-record',[ProductController::class , 'Update_Product_Record']);

//delete-single-product
Route::post('/delete-single-product',[ProductController::class , 'Delete_Single_Product']);



/*
|--------------------------------------------------------------------------
| ExportController Routes
|--------------------------------------------------------------------------
|  
*/

Route::get('/export-products',[ExportController::class , 'Export_Product_Data']);
