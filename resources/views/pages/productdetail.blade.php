@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<!-- content -->
<section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ $product->image }}" />
            </a>
          </div>
          {{-- <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
            </a>
          </div> --}}
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              {{ $product->name }}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $averageRating)
                    <i class="fa fa-star"></i>
                  @elseif($i - 0.5 <= $averageRating)
                    <i class="fas fa-star-half-alt"></i>
                  @else
                    <i class="far fa-star"></i>
                  @endif
                @endfor
                <span class="ms-1">
                  {{ number_format($averageRating, 1) }}
                </span>
              </div>
              <span class="text-muted"><i class="fas fa-comment fa-sm mx-1"></i>{{ $totalReviews }} đánh giá</span>
              <span class="text-muted ms-2"><i class="fas fa-shopping-basket fa-sm mx-1"></i>Đã bán: 0</span>
            </div>
  
            <div class="mb-3">
              <span class="h5">{{ number_format($product->price) }}</span>
              <span class="text-muted"></span>
            </div>
  
            <p>
              {{ $product->description }}
            </p>
            <span class="text-success ms-2">Khuyến mãi: {{ $product->discount }}</br> </span>
            <span class="text-success ms-2">Kho còn : {{ $product->stock }} Sản phẩm</span>

  
            {{-- <div class="row">
              <dt class="col-3">Camera:</dt>
              <dd class="col-9">{{ $product->details->camera ?? 'Không có' }}</dd>
  
              <dt class="col-3">Dung lượng</dt>
              <dd class="col-9">{{ $product->details->storage_capacity ?? 'Không có' }} GB</dd>
  
              <dt class="col-3">Màu</dt>
              <dd class="col-9">{{ $product->details->color ?? 'Không có' }}</dd>
  
              <dt class="col-3">Thương hiệu</dt>
              <dd class="col-9">{{ $product->brand->name ?? 'Không xác định' }}</dd>
            </div> --}}
  
            <hr />
  
            <div class="row mb-4">
              <div class="col-md-4 col-6">
                <label class="mb-2">Dung lượng</label>
                @if ($product->details->storage_capacity)
                <select class="form-select border border-secondary" style="height: 35px;">
                  @foreach (explode(',', $product->details->storage_capacity) as $storage_capacity)
                  <option>{{ $storage_capacity }}</option>
                  @endforeach
                  @else
                  <select class="form-select border border-secondary" style="height: 35px;">
                    <option>Không có</option> 
                  @endif
                </select>
              </div>
              <!-- col.// -->
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Số lượng</label>
                <div class="input-group mb-3" style="width: 170px;">
                  <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="text" class="form-control text-center border border-secondary"  aria-label="Example text with button addon" aria-describedby="button-addon1" />
                  <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-warning shadow-0">Mua ngay {{ number_format($product->price, 0, ',', '.') }} VNĐ </a>
            <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng </a>
            <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Yêu thích </a>
          </div>
        </main>
      </div>
    </div>
  </section>
  <!-- content -->
  
  {{-- <section class="bg-light border-top py-4">
    <div class="container">
      <div class="row gx-4">
        <div class="col-lg-4">
          <div class="px-0 border rounded-2 shadow-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Gợi ý</h5>
                @foreach ($relatedProducts as $related)
                <div class="d-flex mb-3" href="{{ route('product.show', $product->id) }}">
                  <a href="" class="me-3">
                    <img src="{{ $related->image }}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                  </a>
                  <div class="info">
                    <a href="#" class="nav-link mb-1">
                      <br />
                      {{ $related->name }}
                    </a>
                    <strong class="text-dark">{{ number_format($related->price, 0, ',', '.') }} VNĐ</strong>
                  </div>
                </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- Start Blog Section -->
  <div class="blog-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <h2 class="section-title">Gợi ý</h2>
        </div>
        <div class="col-md-6 text-start text-md-end">
          <a href="{{ route('product') }}" class="more">Xem thêm</a>
        </div>
      </div>

      <div class="row">
        @foreach ($relatedProducts as $related)
        <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
          <div class="post-entry">
            <a href="#" class="post-thumbnail"><img src="{{ $related->image }}" alt="Image" class="img-fluid" style="height: 100px; width: 100px"></a>
            <div class="post-content-entry">
              <h3><a href="#">{{ $related->name }}</a></h3>
              <div class="meta">
                <span>của <a href="#">{{ $product->brand->name ?? 'Không xác định' }}</a></span> <span>{{ number_format($related->price, 0, ',', '.') }} VNĐ</a></span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- End Blog Section -->	

  <!-- Start Review Section -->
  <div class="review-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="review-title">Đánh giá sản phẩm</h2>
          
          <!-- Review Form -->
          <div class="review-form">
            <form action="{{ route('review.store') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="mb-4">
                <div class="rating-label">Đánh giá của bạn</div>
                <div class="rating-stars">
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label for="star5" title="5 sao"><i class="fa fa-star"></i></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label for="star4" title="4 sao"><i class="fa fa-star"></i></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label for="star3" title="3 sao"><i class="fa fa-star"></i></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label for="star2" title="2 sao"><i class="fa fa-star"></i></label>
                  <input type="radio" id="star1" name="rating" value="1" />
                  <label for="star1" title="1 sao"><i class="fa fa-star"></i></label>
                </div>
              </div>
              <div class="mb-4">
                <label for="comment" class="form-label">Nhận xét của bạn</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            </form>
          </div>

          <!-- Review List -->
          <div class="review-list">
            @foreach($reviews as $review)
            <div class="review-item">
              <div class="d-flex align-items-center">
                <span class="user-name">{{ $review->user->name }}</span>
                <div class="rating">
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->rating)
                      <i class="fa fa-star"></i>
                    @else
                      <i class="far fa-star"></i>
                    @endif
                  @endfor
                </div>
                <span class="date">{{ $review->created_at->format('d/m/Y') }}</span>
              </div>
              <p class="comment">{{ $review->comment }}</p>
            </div>
            @endforeach

            <!-- Pagination -->
            @if($reviews->hasPages())
            <div class="mt-4">
                {{ $reviews->links('vendor.pagination.custom') }}
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Review Section -->

  @push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/review.css') }}">
  @endpush
@endsection
