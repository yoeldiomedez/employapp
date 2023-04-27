<?php

namespace App\Http\Controllers;

use App\Models\Degree;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Degree::all();
    }
}
