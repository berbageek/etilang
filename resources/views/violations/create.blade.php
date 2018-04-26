@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Tambah Pelanggaran Baru</h3>

                @if ($errors->count() > 0)
                <div class="alert alert-danger">
                    <h3>Gagal Menyimpan</h3>
                    <ul>
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('violations.store') }}" method="post">

                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Nomor Identitas Pelanggar</label>
                        <input type="text" name="violator_identity_number" class="form-control" value="{{ old('violator_identity_number') }}" />
                    </div>

                    <div class="form-group">
                        <label>Nama Pelanggar</label>
                        <input type="text" name="violator_name" class="form-control" value="{{ old('violator_name') }}" />
                    </div>

                    <div class="form-group">
                        <label>Lokasi Pelanggaran</label>
                        <select name="station_id" class="form-control">
                            @foreach (auth()->user()->stations as $station)
                            <option value="{{ $station->id }}">{{ $station->address }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection