<?php

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

Route::get('/', 'PagesController@index');
// Route::get('/', function(){
// 	$table = 'tasks';
// 	fillTable($table);
// 	$tasks = DB::table("tasks")->get();
// 	foreach ($tasks as $task) {
// 		$task->code=nl2br($task->code);
// 		$task->result=nl2br($task->result);
// 	} 
// 	// dd($tasks);
// 	return view("welcome", compact("tasks"));
// });

// function fillTable($table){
	
// }