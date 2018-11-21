@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('alert-success'))
              <p class="alert alert-success">{{ Session::get('alert-success') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif    
            <div class="panel panel-default">
                <div class="panel-heading">Anda telah Login! <br>
                    @if (!(count($category)))
                        Tolong <a href="{{ url('/category/create') }}"> buat kategori </a> sebelum menambahkan data objek <br>
                    @endif
                    @if (!(count($maps)))
                        Tolong <a href="{{ url('/maps/create') }}"> unggah data peta </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
