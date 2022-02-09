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

/**
 *  Gym Member Information API
 */
Route::get('v1/get-member-information/{member_id}', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'getMemberInformation']);
Route::get('v1/get-member-information-details/{id}', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'getMemberInfoDetails']);
Route::post('v1/gym-member-info-create', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'createGymMemberInfo']);
Route::post('v1/gym-member-info-edit', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'updateGymMemberInfo']);
Route::post('v1/gym-member-info-delete', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'deleteGymMemberInfo']);
Route::post('v1/gym-member-info-search', [\App\Http\Controllers\Api\GymMemberInfoApiController::class, 'searchAdminGymMemberInfo']);


/**
 *  Gym Member Classes API
 */
Route::get('v1/get-member-gym-classes/{member_id}', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'getMemberGymClasses']);
Route::get('v1/get-member-gym-class-details/{id}', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'getMemberGymClassDetails']);
Route::post('v1/gym-member-gym-class-create', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'createMemberGymClass']);
Route::post('v1/gym-member-gym-class-edit', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'updateMemberGymClass']);
Route::post('v1/gym-member-gym-class-delete', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'deleteMemberGymClass']);
Route::post('v1/gym-member-gym-class-search', [\App\Http\Controllers\Api\MemberGymClassesApiController::class, 'searchAdminMemberGymClass']);

/**
 *  Gym Member Performance API
 */
Route::get('v1/get-member-gym-performances/{member_id}', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'getMemberGymPerformanceList']);
Route::get('v1/get-member-gym-performance-details/{id}', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'getMemberGymPerformanceDetails']);
Route::post('v1/gym-member-gym-performance-create', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'createMemberGymPerformance']);
Route::post('v1/gym-member-gym-performance-edit', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'updateMemberGymPerformance']);
Route::post('v1/gym-member-gym-performance-delete', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'deleteMemberGymPerformance']);
Route::post('v1/gym-member-gym-performance-search', [\App\Http\Controllers\Api\GymMemberPerformanceTrackApiController::class, 'searchAdminMemberGymPerformance']);

/**
 *  Gym Member Attendance API
 */
Route::get('v1/get-member-gym-attendances/{member_id}', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'getMemberGymAttendanceList']);
Route::get('v1/get-member-gym-attendance-details/{id}', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'getMemberGymAttendanceDetails']);
Route::post('v1/gym-member-gym-attendance-create', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'createMemberGymAttendance']);
Route::post('v1/gym-member-gym-attendance-edit', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'updateMemberGymAttendance']);
Route::post('v1/gym-member-gym-attendance-delete', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'deleteMemberGymAttendance']);
Route::post('v1/gym-member-gym-attendance-search', [\App\Http\Controllers\Api\GymMemberAttendanceApiController::class, 'searchAdminMemberGymAttendance']);

/**
 *  Gym Member Invoices API
 */
Route::get('v1/get-member-gym-invoices/{member_id}', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'getMemberGymInvoicesList']);
Route::get('v1/get-member-gym-invoice-details/{id}', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'getMemberGymInvoiceDetails']);
Route::post('v1/gym-member-gym-invoice-create', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'createMemberGymInvoice']);
Route::post('v1/gym-member-gym-invoice-edit', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'updateMemberGymInvoice']);
Route::post('v1/gym-member-gym-invoice-delete', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'deleteMemberGymInvoice']);
Route::post('v1/gym-member-gym-invoice-search', [\App\Http\Controllers\Api\GymMemberInvoicesApiController::class, 'searchAdminMemberGymInvoice']);
