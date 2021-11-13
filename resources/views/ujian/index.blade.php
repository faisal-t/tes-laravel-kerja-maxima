@extends('layouts')

@section('content')


    <div class="row mr-3">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{ route('ujian.create') }}"><i class="fas fa-plus"></i> Tambah Ujian </a>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama Ujian</th>
            <th>Nama Mapel</th>
            <th>Tanggal Ujian</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_ujian }}</td>
                <td>{{ $data->MataPelajaran->nama_mapel }}</td>
                <td>{!! date('d-M-Y', strtotime($data->tanggal_ujian)) !!}</td>

                <td>
                    <form action="{{ route('ujian.destroy', $data->id) }}" method="POST">



                        <a class="btn btn-primary" href="{{ route('ujian.edit', $data->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
