<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{

    public function list()
    {
        return Course::all();
    }
    
    public function addCourse(array $data)
    {
        return Course::create($data);
    }

}