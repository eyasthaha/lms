@extends('layouts.app')

@section('title', 'Payment Successful')

@section('content')
<div class="container mt-5">
    <div class="text-center p-5 bg-light rounded shadow">
        <div class="mb-3" style="font-size: 50px; color: #28a745;">&#10004;</div>
        <h2 class="mb-3">Payment Successful!</h2>
        <p class="mb-4">Thank you for your payment. Your transaction has been completed successfully.</p>

        {{-- @isset($transactionId) --}}
            <p><strong>Transaction ID:</strong> #10004</p>
        {{-- @endisset --}}

        <a href="{{ route('home') }}" class="btn btn-success mt-3">Go to Home</a>
    </div>
</div>
@endsection
