@extends('layouts.app')

@section('content')
<h2>Menu List</h2>
<div style="display:flex; gap:20px; flex-wrap:wrap;">
@foreach ($items as $item)
    <div style="border:1px solid #ccc; padding:10px; width:200px;">
        
        <img src="/images/{{ $item['image'] }}" width="100%">

        <h3>{{ $item['name'] }}</h3>
        <p>{{ $item['category'] }}</p>
        <p>{{ $item['price'] }}</p>

        <a href="/items/{{ $item['id'] }}">View Details</a>
    </div>
@endforeach
</div>

@endsection