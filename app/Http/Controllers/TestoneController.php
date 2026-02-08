<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;

class TestoneController extends Controller
{
    public function index()
    {
        $classes = AcademicClass::select('id', 'name')->orderBy('id')->get();

        return view('testone', compact('classes'));
    }
}
