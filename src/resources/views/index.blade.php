@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}" /> -->
@endsection

@section('content')

<ul>
    @foreach($products as $product)
    <li>{{$product->name}}
        {{$product->price}}
        <img src="{{asset($product->image)}}" alt="{{$product->name}}">
    </li>
    @endforeach
</ul>

<form action="/products" method="GET">
    <input type="text" name="name">
    <button type="submit">検索</button>
</form>





@endsection