@extends('layouts.master')
@section('name', 'Trang cá nhân')
@section('content')
    
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
     <div class="card p-4">
         <div class=" image d-flex flex-column justify-content-center align-items-center">
             <button class="btn btn-secondary">
                 <img src="{{ 'https://i.imgur.com/wvxPV9S.png' }}" height="100" width="100" />
                </button>
                 <span class="name mt-3">{{ $user->name }}</span>
                  <span class="idd"> Phone Number</span> 
                  <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    <span class="idd1">{{ $user->email }}</span>
                     <span><i class="fa fa-copy"></i></span> 
                    </div>
                     <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                         <span class="number">1069 <span class="follow">Đơn hàng</span></span>
                         </div> 
                         <div class=" d-flex mt-2"> 
                            <button class="btn1 btn-dark">Edit Profile</button> 
                        </div>
                         <div class="text mt-3">
                             <span>Tiểu sử.<br>
                                <br> Null </span> 
                            </div> 
                            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                                <span><i class="fa fa-twitter"></i></span>
                                 <span><i class="fa fa-facebook-f"></i></span>
                                  <span><i class="fa fa-instagram"></i></span> 
                                  <span><i class="fa fa-linkedin"></i></span> 
                                </div> 
                                <div class=" px-2 rounded mt-4 date "> 
                                    <span class="join">Ngày tạo {{ $created_at }}</span> 
                                </div> 
                            </div>
                         </div>
</div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
@endsection