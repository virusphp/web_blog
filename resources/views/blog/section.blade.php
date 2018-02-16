@extends('layouts.master')

@section('content')
asda;sdkas;lda;sjdakjdlkajdlkjasd
asdkjaldadasda
da;lsd;asdkjaldadasdad;akdja;kd'asdkjaldadasdad
<hr>

{{$blog->description}}
<a href="/blog/{{$blog->id}}/edit">edit</a>
<form class="" action="/blog/{{ $blog->id }}" method="post">
  {{ csrf_field() }}
  <input type="submit" name="submit" value="delete">
    <input type="hidden" name="_method" value="delete">
  </form>
@endsection
