@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>My Courses</h2>
        @if($enrollments->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Progress</th>
                        <th>Payment Status</th>
                        <th>Enrolled At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->course->title }}</td>
                            <td>{{ $enrollment->course->price }}</td>
                            <td>{{ $enrollment->course->description }}</td>
                            <td>{{ $enrollment->progress.'%' }}</td>
                            <td>{{ $enrollment->payment_status }}</td>
                            <td>{{ Carbon\Carbon::parse($enrollment->created_at)->format('d-m-Y | h:i a') }}</td>

                            {{-- <td>
                                <form action="{{ route('student.enroll') }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $enrollment->course->id }}">
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure to Enroll?')">Enroll</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No courses found.</p>
        @endif
    </div>

    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection