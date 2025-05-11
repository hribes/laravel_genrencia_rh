<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Department;
use App\Models\Employees;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// POST
Route::post('department', function (Request $request) {
    $department = new Department();
    $department->name = $request->input('name');  
    $department->save();
    return response()->json($department);
});


//GET
Route::get('department', function (){
    $department = Department::all();
    return response ()->json($department);
});

Route::get('department/{id}', function($id){
    $department = Department::find($id);
    return response()->json($department);
});

//PATCH
Route::patch('department/{id}', function(Request $request, $id){
    $department = Department::find($id);

    if($request->input('name') !== null){ # !== é para algo muito específico (exato) do que esta sendo procurado
        $department->name = $request->input('name');
    }

    $department->save();
    return response()->json($department);
});

//DELETE
Route::delete('department/{id}', function($id){
    $department = Department::find($id);
    $department->delete();
    return response()->json($department);
});