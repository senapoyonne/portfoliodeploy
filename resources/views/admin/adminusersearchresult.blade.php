@extends('layouts.admin')

@section('content')


<div class="container">
<div class="row">
            <div class="card col-12 px-0">    
                    <div class="card-header">既存会員の管理</div>
                <div class="card-body">
                    {{-- <ul class="list-group list-group"> --}}
                        <p class="px-4 mb-0">検索して会員を管理</p>
                    <form class="col-12 form-inline mt-2 mt-md-0 mb-4" method="POST" action="{!! route('adminusersearch') !!}"> 
                    @csrf               
                    <input class="col-12 form-control mr-sm-2" type="text" placeholder="会員名やアドレス、住所で検索" aria-label="Search" name="keyword"  value="">
                    <button class="col-12 btn btn-outline-success my-2 my-sm-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    </form>
    
                        <table class="table table-hover">
                            <tbody>
                            @foreach($users as $user)
                            @php
                                $id=$user->id;
                            @endphp
                              <tr>
                                <td colspan="3">
                                    <span pr-4> {{$user->id}}</span>
                                </td>
                                <td colspan="3">
                                    <span pr-4> {{$user->group_id}}</span>
                                </td>
                                <td colspan="3">
                                    <span pr-4> {{$user->name}}</span>
                                </td>
                                <td colspan="3">
                                    <span pr-4> {{$user->email}}</span>
                                </td>
                                <td colspan="3">
                                    <span pr-4> {{$user->created_at}}</span>
                                </td>
                                <td colspan="3">
                                    <span pr-4> {{$user->zipcode}} | {{$user->address1}} | {{$user->address2}}</span>
                                </td>
 
                                <td colspan="1" style="width:10%;height:5%;">
                                    <form style="width:100%;height:100%;" method="GET"><button onclick='location.href="{!! url('/admin/poyopoyopage/userdatabase/edit/'.$id) !!}"'  type="button" class="btn btn-primary">編集</button></form>    
                                </td>  
                                
                                <td colspan="1" style="width:10%;height:5%;">
                                    <form style="width:100%;height:100%;" method="POST" action="{!! url('/admin/poyopoyopage/userdatabase/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn btn-danger">削除</button></form>

                                </td>                                   
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
    
                          {{ $users->links() }}
                        
                    {{-- </ul> --}}
                </div>
            </div>
        </div>  
</div>



@endsection