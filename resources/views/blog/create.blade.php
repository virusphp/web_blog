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

<form class="" action="/blog" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

        <div class="form-group" {{ !$errors->has('email') ? 'has-error' : '' }}>
          <label for="">Email</label>
          <input type="text" name="email">
        <span class="help-block text-danger">{{$errors->first('email')}}</span>
        </div>

        <div class="form-group" {{!$errors->has('title') ? 'has-error' : '' }}>
        <label for="">title</label>
        <input type="text" name="title">
        <span class="help-block text-danger">{{$errors->first('title')}}</span>
       </div>

        <div  class="form-group"  {{ !$errors->has('description') ? 'has-error' : '' }}>
        <label for="">description</label>
        <textarea name="description" rows="8" cols="80"></textarea>
        <span class="help-block text-danger">{{$errors->first('description')}}</span>
        </div>


        <div  class="form-group"  {{ !$errors->has('feature_img') ? 'has-error' : '' }}>
        <label for="">Upload Img</label>
        <input type="file" name="feature_img">
        <span class="help-block text-danger">{{$errors->first('feature_img')}}</span>
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
