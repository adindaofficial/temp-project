@extends('frontend.layouts.app')
@section('content')
<div>
    <h2>Total {{ $user_count }} Users</h2>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection