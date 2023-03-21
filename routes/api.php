<?php

//php artisan serve
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

//login and logout
Route::post('/login', [AuthController::class, 'login']);
//logout is protected
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


//protected routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    users
*/
Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{username}', [UserController::class, 'show']);


/*
    news
*/

Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/{news}', [NewsController::class, 'show']);

Route::middleware('auth:sanctum')->post('/news', [NewsController::class, 'store']);

Route::middleware('auth:sanctum')->put('/news/{news}', [NewsController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/news/{news}', [NewsController::class, 'destroy']);


/*
    comments
*/
Route::get('/news/{news}/comments', [CommentController::class, 'getComments']);

Route::middleware('auth:sanctum')->post('/news/comments', [CommentController::class, 'store']);

Route::middleware('auth:sanctum')->put('/news/comments/{comment}', [CommentController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/news/comments/{comment}', [CommentController::class, 'destroy']);


/*
    activities
*/
Route::middleware('auth:sanctum')->get('/activity/{name}', [ActivityController::class, 'show']);

Route::middleware('auth:sanctum')->post('/activity', [ActivityController::class, 'store']);

Route::middleware('auth:sanctum')->put('/activity/{name}', [ActivityController::class, 'update']);

Route::middleware('auth:sanctum')->delete('/activity/{name}', [ActivityController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/users/{username}/activities', [UserController::class, 'showActivities']);

Route::middleware('auth:sanctum')->get('/userActivitiesTable', [ActivitiesUsersController::class, 'getUsersActivitiesTable']);

Route::middleware('auth:sanctum')->post('/activityDone', [ActivitiesUsersController::class, 'done']);

Route::middleware('auth:sanctum')->delete('/activityDone', [ActivitiesUsersController::class, 'unDone']);


/*
    attendance
*/
Route::middleware('auth:sanctum')->post('/attendanceDay', [AttendanceDayController::class, 'store']);

Route::middleware('auth:sanctum')->delete('/attendance/{day}', [AttendanceDayController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/attendanceUsersTable', [AttendanceDaysUsersController::class, 'getAttendanceUsersTable']);

Route::middleware('auth:sanctum')->post('/attendance', [AttendanceDaysUsersController::class, 'add']);

Route::middleware('auth:sanctum')->delete('/attendance', [AttendanceDaysUsersController::class, 'delete']);


/*
    tournaments
*/
Route::get('/tournament', [TournamentController::class, 'index']);

Route::middleware('auth:sanctum')->post('/tournament', [TournamentController::class, 'store']);

Route::middleware('auth:sanctum')->delete('/tournament/{tournament}', [TournamentController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/tournament/{tournament}', [TournamentController::class, 'show']);

Route::middleware('auth:sanctum')->put('/tournament/{tournament}', [TournamentController::class, 'update']);

//tournaments users
Route::middleware('auth:sanctum')->post('/tournament/{tournament}/user', [TournamentController::class, 'addUser']);

Route::middleware('auth:sanctum')->delete('/tournament/{tournament}/user', [TournamentController::class, 'deleteUser']);


/*
    games
*/
Route::middleware('auth:sanctum')->put('/game', [GameController::class, 'update']);

Route::middleware('auth:sanctum')->get('/game/{game}', [GameController::class, 'show']);


/*
    events
*/
Route::get('/event', [EventController::class, 'index']);

Route::get('/event/{event}', [EventController::class, 'show']);

Route::middleware('auth:sanctum')->post('/event', [EventController::class, 'store']);

Route::middleware('auth:sanctum')->delete('/event/{event}', [EventController::class, 'destroy']);

Route::middleware('auth:sanctum')->put('/event/{event}', [EventController::class, 'update']);

