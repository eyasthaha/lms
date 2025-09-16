<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Services\CourseService;

class StudentController extends Controller
{
    protected $courseService;
    public function __construct(CourseService $courseService) {
        $this->courseService = $courseService;
    }

    public function index(Request $request){

        $query = Course::query();

        // Search by title or description
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $courses = $query->paginate(10); // paginate results

        return view('home', compact('courses', 'search'));
    }

    public function courses(Request $request){

        $user = $request->user();

        $enrollments = Enrollment::where('user_id', $user->id)->with('course')->get();

        return view('my-courses', compact('enrollments'));
    }


     /**
     * Enroll in a course.
     */
    public function enroll(Request $request){

        $user = $request->user();

        // Check if already enrolled
        $existingEnrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $request->input('course_id'))
            ->first();  

        if ($existingEnrollment) {
            return redirect()->back()->with('success', 'You are already enrolled in this course.');
        }   
        
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $request->input('course_id'),
            'status' => 'enrolled',
            'progress' => 0,
            'payment_status' => 'paid',
        ]);

        return redirect()->route('payment.index')->with('success', 'Enrolled in course successfully.');
    }

        public function search(Request $request){

        $query = $request->input('query');

        $courses = Course::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return view('home',compact('courses'));
    }


}
