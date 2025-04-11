@extends('admin.layouts.masterad')
@section('title', 'Chỉnh sửa Banner')

@section('content')
<div class="content" id="content">
    <h1> Quản lý Banner</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<h2>Chỉnh sửa banner</h2>
<form method="POST" action="{{ route('admin.pages.Banners.update', $banner->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.pages.Banners.form')
</form>
</div>
@endsection
