@extends('layouts')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Peserta</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('peserta.index') }}"> Back</a>
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
   
<form action="{{ route('peserta.store') }}" method="POST">
    @csrf
  
    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Peserta:</strong>
                <select name="nis" class="form-control">
                    @foreach ($siswa as $item)
                        <option value="{{$item->nis}}">{{$item->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ujian:</strong>
                <select name="ujian_id" class="form-control">
                    @foreach ($ujian as $ujian)
                        <option value="{{$ujian->id}}">{{$ujian->nama_ujian}}</option>
                    @endforeach
                </select>
            </div>
        </div>

       
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection