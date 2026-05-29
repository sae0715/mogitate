@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}" />
@endsection

@section('content')
<form action="/products/register" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h1>商品登録</h1>

        <div class="form-group">
            <p>商品名 <span class="required">必須</span></p>
            <input type="text" name="name" placeholder="商品名を入力">
            @error('name')<p class="error">{{$message}}</p>@enderror
        </div>

        <div class="form-group">
            <p>値段 <span class="required">必須</span></p>
            <input type="text" name="price" placeholder="値段を入力">
            @error('price')<p class="error">{{$message}}</p>@enderror
        </div>

        <div class="form-group">
            <p>商品画像 <span class="required">必須</span></p>
            <input type="file" name="image" id="image-select" accept="image/*">
            @error('image')<p class="error">{{$message}}</p>@enderror
        </div>

        <div class="form-group">
            <p>季節 <span class="required">必須</span> <span class="multiple">複数選択可</span></p>
            <div class="seasons">
                <input type="checkbox" name="seasons[]" value="1">春
                <input type="checkbox" name="seasons[]" value="2">夏
                <input type="checkbox" name="seasons[]" value="3">秋
                <input type="checkbox" name="seasons[]" value="4">冬
            </div>
            @error('seasons')<p class="error">{{$message}}</p>@enderror
        </div>

        <div class="form-group">
            <p>商品説明 <span class="required">必須</span></p>
            <textarea name="description" id="description" rows="7" placeholder="商品の説明を入力"></textarea>
            @error('description')<p class="error">{{$message}}</p>@enderror
        </div>

        <div class="btn-area">
            <button class="back-btn" type="button" onclick="history.back()">戻る</button>
            <button class="save-btn" type="submit">登録</button>
        </div>
    </div>
</form>
@endsection