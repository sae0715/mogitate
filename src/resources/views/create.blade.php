@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}" /> -->
@endsection

@section('content')
<form action="/products/register" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>商品登録</h1>

    <p>商品名</p>
    <p>必須</p>
    <input type="text" name="name">
    @error('name')
    {{$message}}
    @enderror
    <br>

    <p>値段</p>
    <p>必須</p>
    <input type="text" name="price">
    @error('price')
    {{$message}}
    @enderror
    <br>

    <p>商品画像</p>
    <label for="image-select">ファイルを選択:</label>
    <input type="file" name="image" id="image-select" accept="image/*">
    @error('image')
    {{$message}}
    @enderror
    <br>

    <p>季節
    <p>必須</p>
    <p>複数選択化</p>
    <input type="checkbox" name="seasons[]" value="1">春
    <input type="checkbox" name="seasons[]" value="2">夏
    <input type="checkbox" name="seasons[]" value="3">秋
    <input type="checkbox" name="seasons[]" value="4">冬
    </p>
    @error('seasons')
    {{$message}}
    @enderror
    <br>

    <p>商品説明</p>
    <p>必須</p>
    <textarea name="description" id="description" rows="7" cols="100">
    </textarea>
    @error('description')
    {{$message}}
    @enderror
    <br>

    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">登録</button>
</form>


@endsection