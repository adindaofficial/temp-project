@extends('frontend.layouts.app')
@section('content')
<div>
    <h2>Total {{ $user_count }} Users</h2>
</div>
<div class="mt-3 mb-3">
    <button type="button" data-bs-toggle="modal" data-bs-target="#TambahModal" class="btn btn-primary">add user</button>
    <button type="button" data-bs-toggle="modal" data-bs-target="#TambahModalCaptcha" class="btn btn-primary">add user with captcha</button>
    <button type="button" data-bs-toggle="modal" data-bs-target="#TambahModalCaptcha_Server" class="btn btn-primary">add user with captcha server</button>
    <form method="POST" action="{{ route('user.reset') }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">reset users</button>
    </form>
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
@include('frontend.user.modal.tambah')
@include('frontend.user.modal.tambah-captcha')
@include('frontend.user.json.schema-org')
@endsection