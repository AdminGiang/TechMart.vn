@extends('admin.layouts.masterad')
@section('title', 'Thêm Banner')

@section('content')
<div class="content" id="content">
    <h1>Quản lý Banner</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
   
<h2>Thêm banner</h2>
<form method="POST" action="{{ route('admin.pages.Banners.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.pages.Banners.form')
</form>
</div>
@endsection
