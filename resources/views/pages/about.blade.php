@extends('layouts.master')
@section('title', 'Chúng tôi')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Về Chúng tôi</h1>
                    <p class="mb-4">Khám phá các dòng iPhone mới nhất với thiết kế sang trọng,
                         hiệu năng mạnh mẽ và camera đẳng cấp. Trải nghiệm hệ điều hành iOS mượt mà, 
                         bảo mật tối ưu và hệ sinh thái Apple tiện lợi. 
                        Sở hữu ngay iPhone chính hãng với nhiều ưu đãi hấp dẫn!</p>
                    <p><a href="" class="btn btn-secondary me-2">Xem ngay</a><a href="#" class="btn btn-white-outline">Mua ngay</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{asset('assets/images/img-iphone-banner.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1"><img src="{{asset('assets/images/image-grid-phone.jpg')}}" alt="Untree.co"></div>
                    <div class="grid grid-2"><img src="{{asset('assets/images/image-grid-Vivo.webp')}}" alt="Untree.co"></div>
                    <div class="grid grid-3"><img src="{{asset('assets/images/image-grid-phone.jpg')}}" alt="Untree.co"></div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4">Giúp bạn tiếp cận công nghệ hiện đại</h2>
                <p>Chúng tôi mang đến những giải pháp công nghệ tiên tiến, giúp bạn tối ưu hóa công việc và nâng cao trải nghiệm người dùng. Với sản phẩm chất lượng và dịch vụ chuyên nghiệp, bạn sẽ luôn đi đầu trong xu hướng công nghệ.</p>

                <ul class="list-unstyled custom-list my-4">
                    <li>Cập nhật công nghệ mới nhất</li>
                    <li>Giải pháp tối ưu cho mọi nhu cầu</li>
                    <li>Bảo hành và hỗ trợ tận tâm</li>
                    <li>Mua sắm dễ dàng, thanh toán linh hoạt</li>
                </ul>
                <p><a href="{{route('product')}}" class="btn">Khám phá</a></p>
            </div>
        </div>
    </div>
</div>
<!-- End We Help Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Đội ngũ chúng tôi</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/images/person_1.jpg')}}" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                <h3><a href="#"><span class="">Trường</span> Giang</a></h3>
                <span class="d-block position mb-4">Đép lỏ</span>
                <p>Mô tả.</p>
                <p class="mb-0"><a href="#" class="more dark">Xem thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/images/person_2.jpg')}}" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                <h3><a href="#"><span class="">Thành</span> Nhân</a></h3>
                <span class="d-block position mb-4">Leader</span>
                <p>Mô tả.</p>
                <p class="mb-0"><a href="#" class="more dark">Xem thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/images/person_3.jpg')}}" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                <h3><a href="#"><span class="">Thành</span> Sứ</a></h3>
                <span class="d-block position mb-4">Code lỏ</span>
                <p>Mô tả.</p>
                <p class="mb-0"><a href="#" class="more dark">Xem thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{asset('assets/images/person_4.jpg')}}" class="img-fluid mb-3" style="width: 150px; height: 150px;">
                <h3><a href="#"><span class="">Thanh</span> Sang</a></h3>
                <span class="d-block position mb-4">Cốt lỏ</span>
                <p>Mô tả.</p>
                <p class="mb-0"><a href="#" class="more dark">Xem thêm <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 4 -->

        </div>
    </div>
</div>
<!-- End Team Section -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title"> Đánh giá của khách hàng </h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                        <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                    </div>

                    <div class="testimonial-slider">
                        
                        <div class="item">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 mx-auto">

                                    <div class="testimonial-block text-center">
                                        <blockquote class="mb-5">
                                            <p>&ldquo; thà bỏ con chứ không mua hàng. &rdquo;</p>
                                        </blockquote>

                                        <div class="author-info">
                                            <div class="author-pic">
                                                <img src="{{asset('assets/images/bocon.jfif')}}" alt="Maria Jones" class="img-fluid">
                                            </div>
                                            <h3 class="font-weight-bold">Trịnh Trần Phương Tuấn</h3>
                                            <span class="position d-block mb-3">Thời gian mua sản phấm</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        <!-- END item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Testimonial Slider -->

@endsection