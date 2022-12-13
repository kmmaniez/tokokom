@extends('admin.layouts')

@section('konten')
    <h3>List Users</h3>
    <a href="/users/create-user" class="btn btn-md btn-primary">Tambah Users</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->telepon }}</td>
                <td>
                    <form action="/users/delete-user/{{ $user->id }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="/users/edit-user/{{ $user->id }}" class="btn btn-sm btn-primary">EDIT</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection