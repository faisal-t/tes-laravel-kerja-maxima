@extends('layouts')

@section('content')




    <div class="row mr-3">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{ route('peserta.create') }}"><i class="fas fa-plus"></i> Tambah Peserta
            </a>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>nis</th>
            <th>Nama Peserta</th>
            <th>Nama Ujian</th>
            <th>Tanggal Ujian</th>
            <th>Mata Pelajaran</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->siswa->nama }}</td>
                <td>{{ $data->ujian->nama_ujian }}</td>
                <td>{{ $data->ujian->tanggal_ujian->format('d-M-Y') }}</td>

                <td>{{ $data->ujian->MataPelajaran->nama_mapel }}</td>
                <td>{{$data->nilai ? $data->nilai : "Belum Mengerjakan Ujian"}}</td>


                <td>
                    <form action="{{ route('peserta.destroy', $data->id) }}" method="POST">



                        <a class="btn btn-primary" href="{{ route('peserta.edit', $data->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection
