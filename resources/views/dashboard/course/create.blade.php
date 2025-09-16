@extends('dashboard.layout')

@section('content')

    <div class="container">
        <h2>{{$isEdit ? 'Edit Course' : 'Register a Course'}}</h2>

        <form action="{{ $isEdit ? route('courses.update',$course->id) : route('courses.store') }}" method="POST">
            @csrf
            @if($isEdit)
                @method('PATCH')
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control" value="{{$isEdit ? $course->title : ''}}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{$isEdit ? $course->price : ''}}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control">{{$isEdit ? $course->description : ''}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Register Course</button>
        </form>
    </div>

@endsection