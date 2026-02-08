<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function subjects(Request $request)
    {
        return response()->json(
            Subject::where('class_id', $request->class_id)
                ->select('id', 'sub_name')
                ->get()
        );
    }

    public function chapters(Request $request)
    {
        return response()->json(
            Chapter::where('subject_id', $request->subject_id)
                ->select('id', 'chapter_name')
                ->get()
        );
    }

    public function lessons(Request $request)
    {
        return response()->json(
            Lesson::where('chapter_id', $request->chapter_id)
                ->select('id', 'lesson_name')
                ->get()
        );
    }
}
