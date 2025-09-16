<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }

    public function index(){

        $courses = $this->courseService->list();

        return view('dashboard.course.index',compact('courses'));
    }

    public function create(){

        $isEdit = false;
        return view('dashboard.course.create',compact('isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Example of service container usage.
     */
    public function store(CourseRequest $request){
        
        $this->courseService->addCourse($request->validated());

        return redirect()->route('dashboard.index')->with('success', 'Course created successfully.');
    }

    public function edit($id){

        $isEdit = true;
        $course = Course::findOrFail($id);
        return view('dashboard.course.create',compact('course','isEdit'));
    }

    public function update(CourseRequest $request, $id){

        $course = Course::findOrFail($id);
        $course->update($request->validated());

        return redirect()->route('courses.list')->with('success', 'Course updated successfully.');
    }

    public function destory($id){

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.list')->with('success', 'Course deleted successfully.');
    }


}
