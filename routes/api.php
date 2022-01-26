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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


/**
 *  Admin API
 */

Route::get('v1/get-admins-list', [\App\Http\Controllers\Api\AdminApiController::class, 'getAdmins']);
Route::get('v1/get-first-ten-admins', [\App\Http\Controllers\Api\AdminApiController::class, 'getRecentAdmins']);
Route::get('v1/get-admin-details/{id}', [\App\Http\Controllers\Api\AdminApiController::class, 'getAdminDetails']);
Route::post('v1/admin-create', [\App\Http\Controllers\Api\AdminApiController::class, 'createAdmin']);
Route::post('v1/admin-edit', [\App\Http\Controllers\Api\AdminApiController::class, 'updateAdmin']);
Route::post('v1/admin-delete', [\App\Http\Controllers\Api\AdminApiController::class, 'deleteAdmin']);
Route::post('v1/admin-search', [\App\Http\Controllers\Api\AdminApiController::class, 'searchAdmin']);
Route::post('v1/admin-reset-password', [\App\Http\Controllers\Api\AdminApiController::class, 'resetPassword']);
Route::post('v1/admin-change-password', [\App\Http\Controllers\Api\AdminApiController::class, 'changePassword']);
Route::post('v1/admin-edit-profile', [\App\Http\Controllers\Api\AdminApiController::class, 'updateAdminProfile']);


/**
 *  Gym class API
 */

Route::get('v1/get-gym-class-list', [\App\Http\Controllers\Api\GymClassApiController::class, 'getGymClassList']);
Route::get('v1/get-recent-gym-class', [\App\Http\Controllers\Api\GymClassApiController::class, 'getRecentGymClasses']);
Route::get('v1/get-gym-class-details/{id}', [\App\Http\Controllers\Api\GymClassApiController::class, 'getGymClassDetails']);
Route::post('v1/gym-class-create', [\App\Http\Controllers\Api\GymClassApiController::class, 'createGymClass']);
Route::post('v1/gym-class-edit', [\App\Http\Controllers\Api\GymClassApiController::class, 'updateGymClass']);
Route::post('v1/gym-class-delete', [\App\Http\Controllers\Api\GymClassApiController::class, 'deleteGymClass']);
Route::post('v1/gym-class-search', [\App\Http\Controllers\Api\GymClassApiController::class, 'searchAdminGymClass']);


/**
 *  Gym class Rates API
 */

Route::get('v1/get-gym-class-rates/{gym_class_id}', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'getGymClassRates']);
Route::get('v1/get-gym-class-rates-details/{id}', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'getGymClassRatesDetails']);
Route::post('v1/gym-class-rates-create', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'createGymClassRates']);
Route::post('v1/gym-class-rates-edit', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'updateGymClassRates']);
Route::post('v1/gym-class-rates-delete', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'deleteGymClassRates']);
Route::post('v1/gym-class-rates-search', [\App\Http\Controllers\Api\GymClassRateApiController::class, 'searchAdminGymClass']);

/**
 *  Gym Trainer API
 */

Route::get('v1/get-all-trainers', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'getGymTrainersList']);
Route::get('v1/get-gym-class-trainers/{gym_class_id}', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'getGymClassTrainers']);
Route::get('v1/get-gym-trainer-details/{id}', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'getGymTrainerDetails']);
Route::post('v1/gym-trainer-create', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'createGymTrainer']);
Route::post('v1/gym-trainer-edit', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'updateGymTrainer']);
Route::post('v1/gym-trainer-delete', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'deleteGymTrainer']);
Route::post('v1/gym-trainer-search', [\App\Http\Controllers\Api\GymTrainerApiController::class, 'searchAdminGymTrainer']);

/**
 *  Gym Members API
 */

Route::get('v1/get-all-members', [\App\Http\Controllers\Api\MemberApiController::class, 'getMembersList']);
Route::get('v1/get-gym-class-members/{gym_class_id}', [\App\Http\Controllers\Api\MemberApiController::class, 'getGymClassMembers']);
Route::get('v1/get-gym-member-details/{id}', [\App\Http\Controllers\Api\MemberApiController::class, 'getGymMemberDetails']);
Route::post('v1/gym-member-create', [\App\Http\Controllers\Api\MemberApiController::class, 'createGymMember']);
Route::post('v1/gym-member-edit', [\App\Http\Controllers\Api\MemberApiController::class, 'updateGymMember']);
Route::post('v1/gym-member-delete', [\App\Http\Controllers\Api\MemberApiController::class, 'deleteGymMember']);
Route::post('v1/gym-member-search', [\App\Http\Controllers\Api\MemberApiController::class, 'searchAdminGymMember']);
