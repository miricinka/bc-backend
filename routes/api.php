<?php

//php artisan serve
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SkillController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ActivitiesUsersController;
use App\Http\Controllers\AttendanceDayController;
use App\Http\Controllers\AttendanceDaysUsersController;
use App\Http\Controllers\EventController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function () {
    Route::apiResource('skills', SkillController::class);
});

Route::group([], function () {
    Route::apiResource('news', NewsController::class);
});

Route::get('/news/{news}/comments', [CommentController::class, 'getComments']);

Route::post('/news/comments', [CommentController::class, 'store']);

Route::put('/news/comments/{comment}', [CommentController::class, 'update']);

Route::delete('/news/comments/{comment}', [CommentController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{username}', [UserController::class, 'show']);
//delete later
Route::get('/activity/{name}', [ActivityController::class, 'show']);

Route::post('/activity', [ActivityController::class, 'store']);

Route::put('/activity/{name}', [ActivityController::class, 'update']);

Route::delete('/activity/{name}', [ActivityController::class, 'destroy']);

Route::get('/users/{username}/activities', [UserController::class, 'showActivities']);

Route::get('/userActivitiesTable', [ActivitiesUsersController::class, 'getUsersActivitiesTable']);

Route::post('/activityDone', [ActivitiesUsersController::class, 'done']);

Route::delete('/activityUnDone', [ActivitiesUsersController::class, 'unDone']);

Route::post('/attendanceDay', [AttendanceDayController::class, 'store']);

Route::delete('/attendance/{day}', [AttendanceDayController::class, 'destroy']);

Route::get('/attendanceUsersTable', [AttendanceDaysUsersController::class, 'getAttendanceUsersTable']);

Route::post('/attendance', [AttendanceDaysUsersController::class, 'add']);

Route::delete('/attendance', [AttendanceDaysUsersController::class, 'delete']);

Route::get('/tournament', [TournamentController::class, 'index']);

Route::post('/tournament', [TournamentController::class, 'store']);

Route::delete('/tournament/{tournament}', [TournamentController::class, 'destroy']);

Route::get('/tournament/{tournament}', [TournamentController::class, 'show']);

Route::put('/tournament/{tournament}', [TournamentController::class, 'update']);

Route::put('/game', [GameController::class, 'update']);

Route::get('/game/{game}', [GameController::class, 'show']);

Route::get('/event', [EventController::class, 'index']);

Route::post('/event', [EventController::class, 'store']);

Route::delete('/event/{event}', [EventController::class, 'destroy']);

Route::get('/event/{event}', [EventController::class, 'show']);

Route::put('/event/{event}', [EventController::class, 'update']);

