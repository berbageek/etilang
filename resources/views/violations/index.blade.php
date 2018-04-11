@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Daftar Pelanggaran</h3>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nomor Pelanggaran</th>
                    <th>Nama Pelanggar</th>
                    <th>Identitas Pelanggar</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->violator_name }}</td>
                    <td>{{ $item->violator_identity_number }}</td>
                </tr>
                @endforeach

                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection