@extends('layouts.master')
@section('title', 'Dịch vụ')
@section('content')

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
@endsection