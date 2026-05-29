@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="heading">
        <h2>商品一覧</h2>
        <a class="add-btn" href="/products/register">+商品を追加</a>
    </div>

    <div class="main">
        <div class="sidebar">
            <form action="/products" method="GET">
                <input type="text" name="name" placeholder="商品名で検索">
                <button type="submit">検索</button>

                <p>価格順で表示</p>
                <select name="sort" id="sort">
                    <option value="default">価格で並び替え</option>
                    <option value="price_desc">高い順に表示</option>
                    <option value="price_asc">低い順に表示</option>
                </select>
            </form>
        </div>

        <div class="products">
            @foreach($products as $product)
            <a class="product-card" href="/products/detail/{{$product->id}}">
                <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                <p>{{$product->name}} <span>¥{{$product->price}}</span></p>
            </a>
            @endforeach
        </div>
    </div>

    {{ $products->links() }}

    @if($sort !== 'default')
    <div id="modal">
        @if($sort === 'price_desc')
        <p>高い順に表示</p>
        @elseif($sort === 'price_asc')
        <p>低い順に表示</p>
        @endif
        <button id="close">×</button>
    </div>
    @endif
</div>

<script>
    document.getElementById('close').addEventListener('click', function() {
        document.getElementById('modal').style.display = 'none';
    });
</script>

@endsection