@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload New File</div>
                <div class="panel-body">
  <!-- cara menampilkan error smua -->
  <!-- @foreach($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach -->

<form class="" action="{{ route('suggests.store') }}" method="post">
  {{ csrf_field() }}

        <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
          <label for="">name</label>
          <input type="text" name="name">
        <span class="help-block text-danger">{{ $errors->first('name')}}</span>
        </div>

        <div class="form-actions">
                                 <button type="submit" class="btn btn-primary">create</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
