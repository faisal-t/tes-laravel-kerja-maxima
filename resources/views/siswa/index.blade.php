@extends('layouts')

@section('content')


    <div class="row mr-3">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{ route('siswa.create') }}"><i class="fas fa-plus"></i> Tambah Siswa </a>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    <form action="{{ route('siswa.destroy', $data->nis) }}" method="POST">



                        <a class="btn btn-primary" href="{{ route('siswa.edit', $data->nis) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
