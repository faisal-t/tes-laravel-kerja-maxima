@extends('layouts')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Mapel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mapel.index') }}"> Back</a>
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
  
    <form action="{{ route('mapel.update',$mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Mapel:</strong>
                    <input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control" placeholder="nama mapel">
                </div>
            </div>
            
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection