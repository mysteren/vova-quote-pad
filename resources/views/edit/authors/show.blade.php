@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="edit-authors-index">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Авторы</a></li>
                <li class="breadcrumb-item active">{{ $author->id }}</li>
            </ol>

            <h1>Автор {{ $author->name }} {{ $author->surname }}</h1>

            <div class="form-group">

            <a href="{{ route('authors.edit',$author->id)}}" class="btn btn-primary">Изменить</a>
                      
            <form class="d-inline-block" action="{{ route('authors.destroy', $author->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Удалить</button>
            </form>
                    

            </div>

            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <tr>
                        <td>ID</td>
                        <td>{{$author->id}}</td>
                    </tr>
                    <tr>
                        <th>Имя</th> 
                        <td>{{$author->name}}</td>        
                    </tr>
                    <tr>
                        <th>Фамилия</th> 
                        <td>{{$author->surname}}</td> 
                    </tr>
                    <tr>
                        <th>Картинка</th> 
                        <td>
                        @if ($author->picture)
                            <img src="<?= $author->picture->getUrl() ?>" alt="" class="img-thumbnail">
                        @endif
                        </td> 
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    @endsection