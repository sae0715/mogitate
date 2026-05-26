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

    <select name="sort" id="sort">
        <option value="default">価格で並び替え</option>
        <option value="price_desc">高い順に表示</option>
        <option value="price_asc">低い順に表示</option>
    </select>
</form>





@endsection