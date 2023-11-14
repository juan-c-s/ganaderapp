@extends('layouts.app')

@section('content')

<!-- resources/views/your_view.blade.php -->

<div class="container mt-4">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>{{__('Title')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Location')}}</th>
                <th>{{__('Update')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData["events"] as $event)
                <tr>
                    <td>{{ $event->getTitle() }}</td>
                    <td>{{ $event->getCategory() }}</td>
                    <td>{{ $event->getLocation() }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection