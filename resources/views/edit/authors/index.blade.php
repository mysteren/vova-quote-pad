@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="edit-authors-index">

            <h1>Авторы</h1>
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Картинка</td>
                    <td colspan="2">Действия</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($authors as $author)

                    <tr>
                    
                        <td>{{$author->id}}</td>
                        <td>{{$author->name}}</td>
                        <td>{{$author->surname}}</td>
                        <td>
                            @if ($author->picture)
                                <img src="<?= $author->picture->getUrl() ?>" alt="" class="img-thumbnail img-fluid">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('authors.show',$author->id)}}" class="btn btn-primary">Смотреть</a>
                            <a href="{{ route('authors.edit',$author->id)}}" class="btn btn-primary">Изменить</a>
                        </td>
                        <td>
                            <form action="{{ route('authors.destroy', $author->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>

            <a href="{{ route('authors.create')}}" class="btn btn-success">Создать</a>

        </div>
    </div>
    
@endsection