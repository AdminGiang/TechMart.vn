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
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{('assets/images/img-iphone-banner.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
                <p>Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất với dịch vụ chuyên nghiệp và tận tâm.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets/images/truck.svg')}}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Miễn phí &amp; Giao hàng nhanh chóng</h3>
                            <p>Giao hàng nhanh trên toàn quốc, giúp bạn nhận được sản phẩm một cách tiện lợi nhất.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets/images/bag.svg')}}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Mua sắm dễ dàng</h3>
                            <p>Giao diện thân thiện, quy trình đơn giản, hỗ trợ khách hàng tận tình.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets/images/support.svg')}}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Đội ngũ tư vấn viên luôn sẵn sàng giúp đỡ bạn bất cứ lúc nào.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets/images/return.svg')}}" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Đổi trả dễ dàng</h3>
                            <p>Chính sách đổi trả linh hoạt, giúp bạn an tâm khi mua sắm.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{asset('assets/images/we us.png!bw700')}}" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_1.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Lawson</span> Arnold</a></h3>
    <span class="d-block position mb-4">CEO, Founder, Atty.</span>
    <p>Separated they live in.
    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_2.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
    <span class="d-block position mb-4">CEO, Founder, Atty.</span>
    <p>Separated they live in.
    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

            </div> 
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_3.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
    <span class="d-block position mb-4">CEO, Founder, Atty.</span>
    <p>Separated they live in.
    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
            </div> 
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_4.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
    <span class="d-block position mb-4">CEO, Founder, Atty.</span>
    <p>Separated they live in.
    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>

  
            </div> 
            <!-- End Column 4 -->

            

        </div>
    </div>
</div>
<!-- End Team Section -->

@endsection