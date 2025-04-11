@extends('layouts.master')
@section('name', 'Trang cá nhân')
@section('content')
    
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
     <div class="card p-4">
         <div class=" image d-flex flex-column justify-content-center align-items-center">
            <div class="profile-container">
                <div class="avatar-frame">
                    <img src="{{asset('assets/images/done.jpg')}}" alt="Ảnh đại diện" class="avatar-img">
                </div>
            </div>
                 <span class="name mt-3">{{ $user->name }}</span>
                 <span>{{ substr($user->phone, 0, 4) }} {{ substr($user->phone, 4, 3) }} {{ substr($user->phone, 7) }}</span>
                  <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    <span class="idd1">{{ $user->email }}</span>
                    </div>
                     <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                         <span class="number">10 <span class="follow">Đơn hàng đã mua</span></span>
                         </div> 
                                <div class=" px-2 rounded mt-4 date "> 
                                    <span class="join">Ngày tạo {{ $created_at }}</span> 
                                </div> 
                            </div>

                            {{-- Start Logout --}}
                            <div class="logout-container">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">
                                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                    </button>
                                </form>
                            </div>                            
                        {{-- End Logout --}}
                         </div>                   
</div>


    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}

    {{-- CSS --}}
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
@endsection