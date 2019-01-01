@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="edit-quotes-index">

            <h1>Цитаты  </h1>

            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div><br />
            @endif
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Дата</td>
                    <td>Текст</td>
                    <td colspan="2">Действия</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $quote)
                    <tr>
                        <td>{{$quote->id}}</td>
                        <td>{{$quote->name}}</td>
                        <td>{{$quote->date}}</td>
                        <td>{{$quote->text}}</td>
                        <td><a href="{{ route('quotes.edit',$quote->id)}}" class="btn btn-primary">Изменить</a></td>
                        <td>
                            <form action="{{ route('quotes.destroy', $quote->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('quotes.create')}}" class="btn btn-success">Создать</a>
        </div>
    </div>
    
@endsection