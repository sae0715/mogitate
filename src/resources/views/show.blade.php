@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
<form action="/products/detail/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="container">
        <p><a href="/products">商品一覧</a> > {{$product->name}}</p>

        <div class="top-area">
            <div class="image-area">
                <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                <div>
                    <input type="file" name="image" id="image-select" accept="image/*">
                </div>
                @error('image'){{$message}}@enderror
            </div>

            <div class="form-area">
                <p>商品名</p>
                <input type="text" name="name" value="{{$product->name}}">
                @error('name'){{$message}}@enderror

                <p>値段</p>
                <input type="text" name="price" value="{{$product->price}}">
                @error('price'){{$message}}@enderror

                <p>季節</p>
                <div class="seasons">
                    <input type="checkbox" name="seasons[]" value="1" {{ $product->seasons->contains('id', 1) ? 'checked' : '' }}>春
                    <input type="checkbox" name="seasons[]" value="2" {{ $product->seasons->contains('id', 2) ? 'checked' : '' }}>夏
                    <input type="checkbox" name="seasons[]" value="3" {{ $product->seasons->contains('id', 3) ? 'checked' : '' }}>秋
                    <input type="checkbox" name="seasons[]" value="4" {{ $product->seasons->contains('id', 4) ? 'checked' : '' }}>冬
                </div>
                @error('seasons'){{$message}}@enderror
            </div>
        </div>

        <div class="description-area">
            <p>商品説明</p>
            <textarea name="description" id="description" rows="7">{{$product->description}}</textarea>
            @error('description'){{$message}}@enderror
        </div>

        <div class="btn-area">
            <button class="back-btn" type="button" onclick="location.href='/products'">戻る</button>
            <button class="save-btn" type="submit">変更を保存</button>
            <form action="/products/{{$product->id}}/delete" method="post">
                @csrf
                @method('DELETE')
                <button class="delete-btn" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
</form>

@endsection