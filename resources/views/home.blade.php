@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Student</h2>
        <ul class="list-group">
            {{-- @foreach($pollings as $polling)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons" style="vertical-align: middle;">poll</span>
                            <h3>{{ $polling->title }}</h3>
                        </div>
                        <p>{{$polling->description}}</p>
                    </div>
                    <div>
                        <a href="{{route('polls.detail',$polling->id)}}" class="btn btn-primary btn-sm">View</a>
                        @if ($polling->userVote)
                            <div class="text-success">Voted</div>
                        @endif
                    </div>
                </li>
            @endforeach --}}
        </ul>
    </div>

    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection