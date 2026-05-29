@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}" /> -->
@endsection

@section('content')
<a href="/products/register">
    +商品を追加
</a>

<ul>
    @foreach($products as $product)
    <a href="/products/detail/{{$product->id}}">
        <li>{{$product->name}}
            {{$product->price}}
            <img src="{{asset($product->image)}}" alt="{{$product->name}}">
        </li>
    </a>
    @endforeach
    {{ $products->links() }}
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