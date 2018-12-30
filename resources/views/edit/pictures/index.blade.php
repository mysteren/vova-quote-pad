@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="edit-pictures-index">

            <h1>Изображения</h1>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Описание</td>
                    <td>Картинка</td>
                    <td>Путь</td>
                    <td colspan="2">Действия</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($pictures as $picture)

                    <tr>
                    
                        <td>{{$picture->id}}</td>
                        <td>{{$picture->description}}</td>
                        <td><img src="" alt=""></td>
                        <td>{{$picture->path}}</td>
                        <td><a href="{{ route('pictures.edit',$picture->id)}}" class="btn btn-primary">Изменить</a></td>
                        <td>
                            <form action="{{ route('pictures.destroy', $picture->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    
@endsection