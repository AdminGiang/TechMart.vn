@extends('layouts.master')

@section('title', 'Trang chủ')
@section('content')	

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Công nghệ <br><span clsas="d-block"> Dẫn đầu xu hướng</span></h1>
								<p class="mb-4">Hiện đại – Tiện ích – Đột phá <br>
									Công nghệ tiên tiến giúp nâng tầm cuộc sống. 
									Sở hữu ngay những thiết bị hiện đại, thông minh và tiện ích nhất tại TechMart.</p>
								<p><a href="" class="btn btn-secondary me-2">Mua ngay</a><a href="{{route('product')}}" class="btn btn-white-outline">Khám phá</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{asset('assets/images/couch.png')}}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Sản phẩm mới</h2>
						<p class="mb-4">Cập nhật xu hướng công nghệ với các sản phẩm mới nhất tại TechMart.</p>
						<p><a href="{{route('product')}}" class="btn">Khám phá</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					@foreach($products as $product)					
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{ route('productdetail')}}">
							<img src="{{$product->Image}}"  class="img-fluid product-thumbnail">
							<h3 class="product-title">{{ $product->Name }}</h3>
							<strong class="product-price">{{ number_format($product->Price) }} VND</strong>
					
							<span class="icon-cross">
								<img src="{{asset('assets/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
					</div>
					@endforeach
					<!-- End Column 2 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

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
							<img src="{{asset('assets/images/why-choose-us-img.jpg')}}" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="{{asset("assets/images/img-grid-1.jpg")}}" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="{{asset("assets/images/img-grid-2.jpg")}}" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="{{asset("assets/images/img-grid-3.jpg")}}" alt="Untree.co"></div>
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
						<p><a herf="{{route('product')}}" class="btn">Khám phá</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{asset('assets/images/product-1.png')}}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Tên sản phẩm</h3>
								<p> Chi tiết sản phẩm </p>
								<p><a href="#">Xem thêm</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

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
													<p>&ldquo; Nội dung phản hổi của khách hàng &rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="{{asset('assets/images/person-1.png')}}" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Tên khách hàng</h3>
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

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Sản phẩm của chúng tôi</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">Xem tất cả sản phẩm</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="{{asset('assets/images/post-1.jpg')}}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Tên sản phẩm</a></h3>
								<div class="meta">
									<span>của <a href="#">Hãng sản phẩm</a></span> <span>Giá: <a href="#">Giá sản phẩm</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

        @endsection