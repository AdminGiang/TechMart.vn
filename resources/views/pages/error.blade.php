@extends('layouts.master')
@section('title', 'Trang lỗi 400')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <img src="{{ asset('assets/images/error-400.jpg') }}" alt="404" class="img-fluid">
            </div>
        </div>
    </div>
    
@endsection