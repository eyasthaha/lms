@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Student</h2>
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search courses..." value="{{$search ?? ''}}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        @if($courses->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <form action="{{ route('student.enroll') }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure to Enroll?')">Enroll</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No courses found.</p>
        @endif
    </div>

<script>
    


</script>
@endsection