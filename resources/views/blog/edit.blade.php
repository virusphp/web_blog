@extends('layouts.master')

@section('content')


<form class="" action="/blog/{{ $blog->id }}" method="post">
  {{ csrf_field() }}
  <input type="text" name="title" value="{{$blog->title }}">
  <br>
  <textarea name="description" rows="8" cols="80">{{$blog->description}}</textarea>
  <input type="submit" name="submit" value="edit">
    <input type="hidden" name="_method" value="put">
</form>
@endsection
