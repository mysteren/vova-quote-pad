@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="edit-quotes-index">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Авторы</a></li>
                <li class="breadcrumb-item active">{{ $quote->id }}</li>
            </ol>

            <h1>Цитата: {{ $quote->name }}</h1>

            <div class="form-group">

                <a href="{{ route('quotes.edit',$quote->id)}}" class="btn btn-primary">Изменить</a>
                        
                <form class="d-inline-block" action="{{ route('quotes.destroy', $quote->id)}}" method="post">
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
                        <td>{{$quote->id}}</td>
                    </tr>
                    <tr>
                        <th>Имя</th> 
                        <td>{{$quote->name}}</td>        
                    </tr>
                    <tr>
                        <th>Автор</th> 
                        <td>{{ $quote->author->name }} {{ $quote->author->surname }}</td> 
                    </tr>
                    <tr>
                        <th>Дата</th>
                        <td>{{$quote->date}}</td> 
                    </tr>
                    <tr>
                        <th>Текст</th>
                        <td>{{$quote->text}}</td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection