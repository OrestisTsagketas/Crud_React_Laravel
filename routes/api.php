<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/Questionnaires','App\Http\Controllers\FssaQuestionnaireController@index');
Route::get('/Questionnaire/{id}','App\Http\Controllers\FssaQuestionnaireController@edit');
Route::post('/Questionnaire/{title}/create','App\Http\Controllers\FssaQuestionnaireController@store');
Route::get('/Questionnaire/{Questionnaire_id}/delete','App\Http\Controllers\FssaQuestionnaireController@destroy');
Route::get('/Questionnaire/{title}/get','App\Http\Controllers\FssaQuestionnaireController@get');

Route::get('/Questions','App\Http\Controllers\FssaQuestionController@index');
Route::get('/Question/{id}','App\Http\Controllers\FssaQuestionController@edit');
Route::post('/Question/{title}/{questionnaire_id}/create','App\Http\Controllers\FssaQuestionController@store');
Route::post('/Question/{id}/{title}/edit','App\Http\Controllers\FssaQuestionController@update');
Route::get('/Question/{questionnaire_id}/show','App\Http\Controllers\FssaQuestionController@show');
Route::get('/Question/{title}/get','App\Http\Controllers\FssaQuestionController@get');


Route::get('/Answers','App\Http\Controllers\FssaAnswerController@index');
Route::get('/Answer/{id}','App\Http\Controllers\FssaAnswerController@edit');
Route::get('/Answer/{question_id}/show','App\Http\Controllers\FssaAnswerController@show');
Route::post('/Answer/{title}/{question_id}/create','App\Http\Controllers\FssaAnswerController@store');
Route::post('/Answer/{id}/{title}/edit','App\Http\Controllers\FssaAnswerController@update');
