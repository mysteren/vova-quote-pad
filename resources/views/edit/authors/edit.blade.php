<?php 

use Illuminate\Support\Facades\Storage;

?>

@extends('layouts.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Авторы</a></li>
        <li class="breadcrumb-item"><a href="{{ route('authors.show', $author->id) }}">{{ $author->id }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Изменить</li>
    </ol>
    </nav>

    <h1>Создать Автора</h1>

    <div class="edit-authors-edit">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form method="post" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data"> 

            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="input-name">Имя:</label>
                <input type="text" class="form-control" name="name" value="{{ $author->name }}"/>
            </div>

            <div class="form-group">
                <label for="input-surname">Фамилия:</label>
                <input type="text" class="form-control" name="surname" value="{{ $author->surname }}"/>
            </div>

            <div class="form-group">
                <label for="input-surname">Изображение:</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Выберите файл</label>
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                </div>

                

            </div>    
        
            @if ($author->picture)
            <div class="form-group">
                <img src="<?= $author->picture->getUrl() ?>" alt="" class="img-thumbnail img-fluid">
            </div>
            @endif
            
            <button type="submit" class="btn btn-success">Изменить</button>

        </form>

    </div>
</div>
@endsection