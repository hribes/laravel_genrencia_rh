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

Route::post('employees', function (Request $request) {
    $employees = new Employees();
    $employees->name = $request->input('name');  
    $employees->cpf = $request->input('cpf');
    $employees->date_birth = $request->input('date_birth');  
    $employees->department_id = $request->input('department_id');
    $employees->save();
    return response()->json($employees);
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

Route::get('employees', function (){
    $employees = Employees::all();
    return response ()->json($employees);
});

Route::get('employees/{id}', function($id){
    $employees = Employees::find($id);
    return response()->json($employees);
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

Route::patch('employees/{id}', function(Request $request, $id){
    $employees = Employees::find($id);

    if($request->input('name') !== null){ # !== é para algo muito específico (exato) do que esta sendo procurado
        $employees->name = $request->input('name');
    }
    if($request->input('cpf') !== null){ # !== é para algo muito específico (exato) do que esta sendo procurado
        $employees->cpf = $request->input('cpf');
    }
    if($request->input('date_birth') !== null){ # !== é para algo muito específico (exato) do que esta sendo procurado
        $employees->date_birth = $request->input('date_birth');
    }

    $employees->save();
    return response()->json($employees);
});

//DELETE
Route::delete('department/{id}', function($id){
    $department = Department::find($id);
    $department->delete();
    return response()->json($department);
});

Route::delete('employees/{id}', function($id){
    $employees = Employees::find($id);
    $employees->delete();
    return response()->json($employees);
});