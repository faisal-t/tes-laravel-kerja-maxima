@extends('layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Ujian</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ujian.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ujian.update', $ujian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Ujian:</strong>
                    <input type="text" value="{{ $ujian->nama_ujian }}" name="nama_ujian" class="form-control"
                        placeholder="Nama Ujian">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mata Pelajaran:</strong>
                    <select name="mata_pelajaran_id" class="form-control">
                        @foreach ($mapel as $item)
                            <option value="{{ $item->id }}"
                                {{ $ujian->mata_pelajaran_id == $item->id ? 'selected' : '' }}>{{ $item->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Ujian:</strong>
                    <input name="tanggal_ujian" class="form-control" required value="{{ $ujian->tanggal_ujian->format('Y-m-d') }}"
                        type="date">
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>

    </form>
@endsection
