<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Department;

class EmployeeDataController extends Controller
{
    //== STUDY MORE ON API AUTHENTICATION
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function countries(){
        
        $countries = Country::all();
        return response()->json($countries);
    }
    public function states(Country $country){
        
        return response()->json($country->states);
        // return response()->json('123');
    }
    public function cities(State $state){
        
        return response()->json($state->cities);
        
        // return response()->json('123');
    }
    public function departments(){
        
        $departments = Department::all();
        return response()->json($departments);
    }

    



}
