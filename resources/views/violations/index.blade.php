@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Daftar Pelanggaran</h3>

            <a href="{{ route('violations.create') }}" class="btn btn-primary">Tambah Pelanggaran</a>

            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nomor Pelanggaran</th>
                    <th>Nama Petugas</th>
                    <th>Nama Pelanggar</th>
                    <th>Identitas Pelanggar</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->violator_name }}</td>
                    <td>{{ $item->violator_identity_number }}</td>
                    <td>
                        <a href="{{ route('violations.edit', $item) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('violations.destroy', $item) }}" method="post">
                            {{ csrf_field() }}
                             @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection