<?php

namespace App\Http\Controllers\web\sparePart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class maintenacePlanController extends Controller
{
    public function index(Request $request)
    {
        return view("sparePart.maintenacePlan");
    }
}