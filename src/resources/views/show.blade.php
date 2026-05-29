@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
<form action="/products/detail/{{$product->id}}" method="POST">
    @csrf
    @method('PUT')

    <a href="/products">商品一覧</a> >{{$product->name}}

    <img src="{{asset($product->image)}}" alt="{{$product->name}}">
    <label for="image-select">ファイルを選択:</label>
    <input type="file" id="image-select" accept="image/*">
    @error('image')
    {{$message}}
    @enderror

    <p>商品名</p>
    <input type="text" name="name" value="{{$product->name}}">
    @error('name')
    {{$message}}
    @enderror
    <br>

    <p>値段</p>
    <input type="text" name="price" value="{{$product->price}}">
    @error('price')
    {{$message}}
    @enderror
    <br>

    <p>季節
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
    <textarea name="description" id="description" rows="7" cols="100">
    {{$product->description}}
    </textarea>
    @error('description')
    {{$message}}
    @enderror
    <br>

    <button type="button" onclick="location.href='/products'">戻る</button>
    <button type="submit">変更を保存</button>
</form>

<form action="/products/{{$product->id}}/delete" method="post">
    @csrf
    @method('DELETE')
    <button type="submit"><i class="fa-solid fa-trash"></i></button>
</form>



@endsection