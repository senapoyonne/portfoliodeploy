@extends('layouts.app')

@section('content')
@section('title', '決済完了')
<div class="container">

  <div class="row py-4">
<p class="text-center col-12">決済が完了しました！</p>
<div class="m-auto" style="padding-top: 16px;"><a href="{{ url('/') }}" class="py-6 btn btn-primary btn-lg active" role="button" aria-pressed="true">　　　サイトトップに戻る　　　</a></div>
  </div> 
</div>
@endsection