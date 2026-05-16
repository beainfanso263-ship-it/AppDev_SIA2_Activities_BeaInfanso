@extends('layouts.app')

@section('content')

<div class="detail-container">
    <h2>{{ $item['name'] }}</h2>
    <img src="{{ asset('images/' . $item['image']) }}" width="300">
    <p><strong>Category:</strong> {{ $item['category'] }}</p>
    <p><strong>Description:</strong> {{ $item['description'] }}</p>
    <p><strong>Price:</strong> {{ $item['price'] }}</p>

    <a href="/items">⬅ Back to Menu</a>
</div>

@endsection