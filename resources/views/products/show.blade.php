@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <form action="{{ route('payment.pay') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="{{ $product->price }}">
        <input type="hidden" name="phone_number" value="{{ old('phone_number') }}">
        <label for="phone_number">Phone Number</label>
        <input type="tel" name="phone_number" required>
        <button type="submit">Pay {{ $product->price }}</button>
    </form>
@endsection
