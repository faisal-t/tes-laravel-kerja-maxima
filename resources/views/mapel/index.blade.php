@extends('layouts')

@section('content')


    <div class="row mr-3">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{ route('mapel.create') }}"><i class="fas fa-plus"></i> Tambah Mapel </a>
        </div>
    </div>

    <table class="table table-bordered mt-2">
        <tr>
            <th>No</th>
            <th>Nama Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_mapel }}</td>

                <td>
                    <form action="{{ route('mapel.destroy', $data->id) }}" method="POST">



                        <a class="btn btn-primary" href="{{ route('mapel.edit', $data->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
