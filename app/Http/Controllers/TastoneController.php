<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;

class TastoneController extends Controller
{
    public function index()
    {
        $classes = AcademicClass::with('subjects.chapter.lessons')->get();

        return view('testone', compact('classes'));
    }
}
