@extends('layouts.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('quotes.index') }}">Цитаты</a></li>
        <li class="breadcrumb-item"><a href="{{ route('quotes.show', $quote->id) }}">{{ $quote->id }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Изменить</li>
    </ol>
    </nav>

    <h1>Изменить цитату</h1>

    <div class="edit-quotes-edit">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form method="post" action="{{ route('quotes.update', $quote->id) }}">

            @method('PATCH')
            @csrf


            <div class="form-group">
                <label for="input-name">Автор:</label>
                <select class="form-control" name="author">
                    <option value="" disabled selected>Автор</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author['id'] }}" <?= $quote->author_id == $author['id'] ? 'selected' : '' ?>> {{ $author['name']}} {{ $author['surname'] }}  </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-name">Название:</label>
                <input type="text" class="form-control" name="name" value="{{ $quote->name }}"/>
            </div>

            <div class="form-group">
                <label for="input-name">Текст:</label>
                <textarea name="text" class="form-control" cols="30" rows="10">{{ $quote->text }}</textarea>
            </div>

            <div class="form-group">
                <label for="input-surname">Дата:</label>
                <input type="date" class="form-control" name="date" value="{{ $quote->date }}"/>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Изменить</button>

        </form>

    </div>
</div>
@endsection