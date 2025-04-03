@extends('layouts.master')

@section('title', 'Liên hệ')
@section('content')

@if (session('success'))
    <div id="alert-success" class="alert-overlay alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="alert-error" class="alert-overlay alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="untree_co-section">
        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 pb-4">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex active"
                                    data-aos="fade-left" data-aos-delay="0">
                                    <div class="service-icon color-1 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg>
                                    </div> <!-- /.icon -->
                                    <div class="service-contents">
                                        <p>22 Lý Thường Kiệt - P9 - Đà Lạt - Lâm Đồng</p>
                                    </div> <!-- /.service-contents-->
                                </div> <!-- /.service -->
                            </div>

                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex active"
                                    data-aos="fade-left" data-aos-delay="0">
                                    <div class="service-icon color-1 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                        </svg>
                                    </div> <!-- /.icon -->
                                    <div class="service-contents">
                                        <p>TechMart@gmail.com</p>
                                    </div> <!-- /.service-contents-->
                                </div> <!-- /.service -->
                            </div>

                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex active"
                                    data-aos="fade-left" data-aos-delay="0">
                                    <div class="service-icon color-1 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg>
                                    </div> <!-- /.icon -->
                                    <div class="service-contents">
                                        <p>84+ 353.694.869</p>
                                    </div> <!-- /.service-contents-->
                                </div> <!-- /.service -->
                            </div>
                        </div>

                        @if (session('error'))
                            <p style="color: red;">{{ session('error') }}</p>
                        @endif
                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="name">Họ Và Tên</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ $name ?? 'Tên không tồn tại' }}" readonly>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="phone">Số Điện Thoại </label>
                                        <input type="number" class="form-control" id="phone"
                                            value="{{ $phone }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-black" for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" value="{{ $email }}"
                                    readonly>
                            </div>

                            <div class="form-group mb-5">
                                <label class="text-black" for="message">Nôi dung</label>
                                <textarea name="content" class="form-control" id="message" cols="30" rows="5" placeholder=" Nội dung "
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary-hover-outline">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script tự động ẩn thông báo -->
    {{-- <script>
        setTimeout(function () {
            var successAlert = document.getElementById('alert-success');
            var errorAlert = document.getElementById('alert-error');
            if (successAlert) {
                successAlert.style.transition = "opacity 0.5s ease";
                successAlert.style.opacity = "0";
                setTimeout(() => successAlert.remove(), 500); // Xóa hẳn phần tử sau khi ẩn
            }
            if (errorAlert) {
                errorAlert.style.transition = "opacity 0.5s ease";
                errorAlert.style.opacity = "0";
                setTimeout(() => errorAlert.remove(), 500); // Xóa hẳn phần tử sau khi ẩn
            }
        }, 3000);
    </script> --}}
    <script>
        setTimeout(function () {
            var successAlert = document.getElementById('alert-success');
            var errorAlert = document.getElementById('alert-error');
            if (successAlert) {
                successAlert.remove();
            }
            if (errorAlert) {
                errorAlert.remove();
            }
        }, 3000);
    </script>


@endsection


<style>
    .alert-overlay {
        position: fixed; /* Hiển thị trên tất cả các phần tử khác */
        top: 20px; /* Cách mép trên 20px */
        left: 50%; /* Canh giữa màn hình theo chiều ngang */
        transform: translateX(-50%); /* Đưa vị trí về giữa */
        z-index: 9999; /* Luôn ở trên cùng */
        padding: 15px 30px;
        font-size: 16px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        animation: fade-in-out 4s ease; /* Hiệu ứng fade-in-out */
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Hiệu ứng fade-in-out */
    @keyframes fade-in-out {
        0% {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }
        10% {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
        90% {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
        100% {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }
    }
</style>
