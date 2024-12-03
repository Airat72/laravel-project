@extends('layouts.app')

@section('content')
    <h1>Список ипотек</h1>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Процент</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mortgages as $mortgage)
                <tr>
                    <td>{{ $mortgage->title }}</td>
                    <td>{{ $mortgage->percent }}%</td>
                    <td>
                        <a href="{{ route('mortgages.show', $mortgage->id) }}">Просмотр</a>
                        <a href="{{ route('mortgages.edit', $mortgage->id) }}">Редактировать</a>
                        <form action="{{ route('mortgages.destroy', $mortgage->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection