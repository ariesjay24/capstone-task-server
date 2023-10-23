<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectProgressController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
// Authentication routes
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

// Protected routes
Route::group(["middleware" => ["auth:sanctum"]], function() {

    // Logout route
    Route::post("/logout", [AuthController::class, "logout"]);

    // Routes for UserProjectController (creating relationships)
    Route::post("/user-projects", [UserProjectController::class, "store"]);

    // Routes for managing user-project relationships (e.g., list, view, delete)
    Route::get("/user-projects", [UserProjectController::class, "index"]);
    Route::get("/user-projects/{id}", [UserProjectController::class, "show"]);
    Route::delete("/user-projects/{id}", [UserProjectController::class, "destroy"]);

    // Routes for managing projects
    Route::get("/projects", [ProjectController::class, "index"]);
    Route::get("/projects/{id}", [ProjectController::class, "show"]);
    Route::post("/projects", [ProjectController::class, "store"]);
    Route::put("/projects/{id}", [ProjectController::class, "update"]);
    Route::delete("/projects/{id}", [ProjectController::class, "destroy"]);

    // Routes for managing tasks
    Route::get("/tasks", [TaskController::class, "index"]);
    Route::get("/tasks/{id}", [TaskController::class, "show"]);
    Route::post("/tasks", [TaskController::class, "store"]);
    Route::put("/tasks/{id}", [TaskController::class, "update"]);
    Route::delete("/tasks/{id}", [TaskController::class, "destroy"]);

    // Route for getting tasks related to a specific project
    Route::get("/projects/{id}/tasks", [TaskController::class, "getTasksByProject"]);


    // Routes for managing project progress
    Route::get("/project-progress", [ProjectProgressController::class, "index"]);
    Route::get("/project-progress/{id}", [ProjectProgressController::class, "show"]);
    Route::post("/project-progress", [ProjectProgressController::class, "store"]);
    Route::put("/project-progress/{id}", [ProjectProgressController::class, "update"]);
    Route::delete("/project-progress/{id}", [ProjectProgressController::class, "destroy"]);

     // Routes for managing attachments
     Route::get("/attachments", [AttachmentController::class, "index"]);
     Route::get("/attachments/{id}", [AttachmentController::class, "show"]);
     Route::post("/attachments", [AttachmentController::class, "store"]);
     Route::put("/attachments/{id}", [AttachmentController::class, "update"]);
     Route::delete("/attachments/{id}", [AttachmentController::class, "destroy"]);

      // Routes for managing comments
     Route::get("/comments", [CommentController::class, "index"]);
     Route::get("/comments/{id}", [CommentController::class, "show"]);
     Route::post("/comments", [CommentController::class, "store"]);
     Route::put("/comments/{id}", [CommentController::class, "update"]);
     Route::delete("/comments/{id}", [CommentController::class, "destroy"]);

     // Routes for managing images
     Route::get('/image/{filename}', [ImageController::class, 'getImage']);
     Route::post('/upload', [ImageController::class, 'upload']);


  });
