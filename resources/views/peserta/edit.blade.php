@extends('layouts')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Mapel</h2>
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
  
    <form action="{{ route('peserta.update',$pesertum->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nis:</strong>
                    <input readonly type="text" name="nis" class="form-control" value="{{$pesertum->nis}}">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Ujian:</strong>
                    <input readonly type="text" name="ujian_id" class="form-control" value="{{$pesertum->ujian_id}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nilai:</strong>
                    <input type="number" name="nilai" class="form-control" value="{{$pesertum->nilai}}">
                </div>
            </div>
    
           
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection