@extends('layouts.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('quotes.index') }}">Цитаты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Создать</li>
    </ol>
    </nav>

    <h1>Создать Автора</h1>

    <div class="edit-quotes-create">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form method="post" action="{{ route('quotes.store') }}">

            <div class="form-group">
                <label for="input-name">Автор:</label>
                <select class="form-control" name="author">
                    <option value="" disabled selected>Автор</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author['id'] }}" > {{ $author['name']}} {{ $author['surname'] }}  </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-name">Название:</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            <div class="form-group">
                <label for="input-name">Текст:</label>
                <textarea name="text" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="input-surname">Дата:</label>
                <input type="date" class="form-control" name="date"/>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Создать</button>

        </form>

    </div>
</div>
@endsection