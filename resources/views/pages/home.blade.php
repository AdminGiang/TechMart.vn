@extends('layouts.master')

@section('title', 'Trang chủ')
@section('content')	

		<!-- Start Hero Section -->
		<div class="owl-carousel owl-theme">
			@foreach($banners as $banner)
				<div class="item">
					<a href="{{ $banner->link }}">
						<img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" class="banner-img">
					</a>
				</div>
			@endforeach
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
					<div class="col-12 col-md-4 col-lg-3 mb-5" action="{{ route('cart') }}" method="POST">
						<a class="product-item" href="{{ route('product.show', $product->id) }}">
							<span class="badge-news">NEW</span>
							<img src="{{$product->image}}"  class="img-fluid product-thumbnail">
							<h3 class="product-title">{{ $product->name }}</h3>
							<strong class="product-price">{{ number_format($product->price) }} VND</strong>
					
							<span class="icon-cross" height="30px" width="30px" >
							<img class="add-to-cart"
								href="{{route('cart')}}"
								data-id="{{ $product->id }}" 
								data-name="{{ $product->name }}" 
								data-price="{{ $product->price }}"
								data-image="{{ $product->image }}"
								src="{{asset('assets/images/cart.svg')}}" alt="Add to cart">
							</span>
						</a>
					</div>
					@endforeach
					<!-- End Column 2 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		{{-- Thương hiệu nổi bật --}}
		<div class="max-w-6xl mx-auto">
			<div class="flex justify-between items-center mb-4">
				<h2 class="text-lg font-bold text-pink-500">THƯƠNG HIỆU NỔI BẬT</h2>
				<a href="{{route('product')}}" class="text-sm text-pink-500">Xem thêm ></a>
			</div>
			<div class="brand-container">
				@foreach($brands as $brand)
					<div class="brand-item">
						<h3>{{ $brand->name }}</h3>
					</div>
				@endforeach
			</div>			
		</div>
		{{-- Thương hiệu nổi bật  --}}

		{{-- Danh mục  --}}
		
		{{-- Danh mục  --}}
		
		


		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Gợi ý cho bạn</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="{{route('product')}}" class="more">Xem thêm</a>
					</div>
				</div>

				<div class="container">
					<div class="row">
						@if(Auth::check())
							@php
								// Tối ưu truy vấn gợi ý sản phẩm
								$suggestedProducts = App\Models\Products::with(['brand'])
									->whereIn('category_id', function($query) {
										$query->select('category_id')
											->from('cart_items')
											->join('products', 'products.id', '=', 'cart_items.product_id')
											->where('cart_items.user_id', Auth::id());
									})
									->whereNotIn('id', function($query) {
										$query->select('product_id')
											->from('cart_items')
											->where('user_id', Auth::id());
									})
									->inRandomOrder()
									->take(6)
									->get();
							@endphp

							@forelse($suggestedProducts as $product)
								<div class="col-md-4">
									<div class="product-card">
										<span class="badge-sale"> -10%</span>
										<img src="{{$product->image}}" class="product-image" loading="lazy">
										<h4 style="color: #3b5d50; text-size: 10px;">{{ number_format($product->price) }} VND</h4>
										<p>{{ $product->name }}</p>
										<p>{{ $product->brand->name ?? 'Không có thương hiệu' }}</p>
										<div class="icons">
											<a href="{{ route('product.show', $product->id) }}"><span>&#128269;</span></a>
											<a href="#"><span>&#9829;</span></a>
											<a class="add-to-cart"
												href="{{route('cart')}}"
												data-id="{{ $product->id }}" 
												data-name="{{ $product->name }}" 
												data-price="{{ $product->price }}"
												data-image="{{ $product->image }}"
												alt="Add to cart"><span>&#128722;</span></a>
										</div>
									</div>
								</div>
							@empty
								@foreach($productsall->take(6) as $product)
									<div class="col-md-4">
										<div class="product-card">
											<span class="badge-sale"> -10%</span>
											<img src="{{$product->image}}" class="product-image" loading="lazy">
											<h4 style="color: #3b5d50; text-size: 10px;">{{ number_format($product->price) }} VND</h4>
											<p>{{ $product->name }}</p>
											<p>{{ $product->brand->name ?? 'Không có thương hiệu' }}</p>
											<div class="icons">
												<a href="{{ route('product.show', $product->id) }}"><span>&#128269;</span></a>
												<a href="#"><span>&#9829;</span></a>
												<a class="add-to-cart"
													href="{{route('cart')}}"
													data-id="{{ $product->id }}" 
													data-name="{{ $product->name }}" 
													data-price="{{ $product->price }}"
													data-image="{{ $product->image }}"
													alt="Add to cart"><span>&#128722;</span></a>
											</div>
										</div>
									</div>
								@endforeach
							@endforelse
						@else
							@foreach($productsall->take(6) as $product)
								<div class="col-md-4">
									<div class="product-card">
										<span class="badge-sale"> -10%</span>
										<img src="{{$product->image}}" class="product-image" loading="lazy">
										<h4 style="color: #3b5d50; text-size: 10px;">{{ number_format($product->price) }} VND</h4>
										<p>{{ $product->name }}</p>
										<p>{{ $product->brand->name ?? 'Không có thương hiệu' }}</p>
										<div class="icons">
											<a href="{{ route('product.show', $product->id) }}"><span>&#128269;</span></a>
											<a href="#"><span>&#9829;</span></a>
											<a class="add-to-cart"
												href="{{route('cart')}}"
												data-id="{{ $product->id }}" 
												data-name="{{ $product->name }}" 
												data-price="{{ $product->price }}"
												data-image="{{ $product->image }}"
												alt="Add to cart"><span>&#128722;</span></a>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
					{{-- start phan trang --}}
					<div class="d-flex justify-content-center">
						{{ $productsall->links('pagination::bootstrap-5') }}
					</div>
					{{-- End phân trang --}}
				</div>
			</div>
		</div>
		<!-- End Blog Section -->
		

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title"> Đánh giá của khách hàng </h2>
					</div>
				</div>
			<hr style="width: 50%; margin: 20px auto; border: 1px solid #ccc;">

			<div id="reviewSection">
				@include('pages.partials.reviews')
			</div>
			
			
			
	</div>
</div>
		<!-- End Testimonial Slider -->

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

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="{{asset("assets/images/image-grid-phone.jpg")}}" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="{{asset("assets/images/image-grid-Vivo.webp")}}" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="{{asset("assets/images/image-grid-phone.jpg")}}" alt="Untree.co"></div>
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

		
		<!-- End Popular Product -->
@endsection
		
@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();

        let productId = $(this).data('id');
        let productName = $(this).data('name');
        let productPrice = $(this).data('price'); 
        let productImage = $(this).data('image');

        $.ajax({
            url: "{{ route('cart.add') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage
            },
            success: function(response) {
                if(response.success) {
                    // Cập nhật số lượng sản phẩm trong giỏ hàng
                    $('.cart-count').text(response.cart_count);
                    if(response.cart_count > 0) {
                        $('.cart-count').show();
                    } else {
                        $('.cart-count').hide();
                    }
                    
                    // Hiển thị thông báo thành công
                    Swal.fire({
                        title: 'Thành công!',
                        text: 'Đã thêm sản phẩm vào giỏ hàng',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: response.message || 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng',
                    icon: 'error'
                });
            }
        });
    });

	var swiper = new Swiper('.swiper-container', {
    slidesPerView: 5,
    spaceBetween: 10,
    loop: true,
    autoplay: { delay: 2000 }
	});

	$(document).ready(function(){
        $(".owl-carousel").owlCarousel({
			loop: true,
			margin: 0, /* Loại bỏ khoảng cách */
			nav: true,
			dots: true,
			autoplay: true,
			autoplayTimeout: 1000,
			autoplayHoverPause: true,
			items: 1
        });
		// Đảm bảo slider không bị dư khoảng trống
		$(".owl-carousel").css("height", "auto");
    });

</script>

<style>
	.product-card {
		border: 1px solid #ddd;
		border-radius: 10px;
		overflow: hidden;
		text-align: center;
		background: #f9f9f9;
		padding: 15px;
		margin: 10px;
	}
	.product-image {
		width: 100%;
		height: 200px;
		margin: 10px;
		object-fit: contain;
	}
	.badge-news {
		background: #880E4F;
		color: white; 
		padding: 5px; 
		border-radius: 5px; 
	}
	.badge-sale { 
		background: #2196F3;
		color: white; 
		padding: 5px; 
		border-radius: 5px; 
	}
	.icons {
		display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
        font-size: 24px;
		 }

	.brand-container {
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
		gap: 20px;
		padding: 20px;
	}

	.brand-item {
		background: #f8f9fa;
		padding: 15px 25px;
		border-radius: 8px;
		text-align: center;
		transition: all 0.3s ease;
		box-shadow: 0 2px 5px rgba(0,0,0,0.1);
	}

	.brand-item:hover {
		transform: translateY(-5px);
		box-shadow: 0 5px 15px rgba(0,0,0,0.2);
	}

	.brand-item h3 {
		margin: 0;
		color: #3b5d50;
		font-size: 1.1rem;
		font-weight: 600;
	}
	.banner-section {
		display: flex;
		overflow: hidden;
		gap: 20px;
}

	.banner-item {
		position: relative;
		text-align: center;
		width: 100%;
}

	.banner-item img {
		width: 100%;
		border-radius: 10px;
}

	.banner-content {
		position: absolute;
		bottom: 20px;
		left: 20px;
		color: white;
		background: rgba(0, 0, 0, 0.5);
		padding: 10px;
		border-radius: 5px;
}
	.owl-dots {
		position: absolute;
		bottom: 10px; /* Điều chỉnh khoảng cách từ bottom */
		left: 50%;
		transform: translateX(-50%);
		background: rgba(0, 0, 0, 0.3); /* Nền mờ giúp hiển thị tốt hơn */
		padding: 5px 10px;
		border-radius: 15px;
}

/* Giảm khoảng cách dưới slider */
	.owl-carousel {
		margin-bottom: 0px !important; /* Loại bỏ khoảng trống bên dưới */
		padding-bottom: 0px;
}

	.slider-container {
		width: 100vw; /* Full chiều rộng viewport */
		max-width: 100%;
		margin: 0 auto; /* Căn giữa */
		overflow: hidden;
}

/* Hình ảnh bên trong slider */
	.slider-container img {
    width: 100%;
    height: auto;
    object-fit: cover; /* Đảm bảo ảnh hiển thị đẹp */
}


</style>
@endsection