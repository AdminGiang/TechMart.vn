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
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark" href="#" >
              {{ $product->name }} <a href="#"><i class="fa-solid fa-heart fa-lg" style="color: #f03838;"></i></i></a>

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
              <span class="text-muted"> |<i class="fas fa-comment fa-sm mx-1"></i> {{ $totalReviews }} đánh giá</span>
              <span class="text-muted ms-2"><i class="fas fa-shopping-basket fa-sm mx-1"></i>| Đã bán: 0</span>
            </div>
  
            <div class="mb-3">
              <span class="h5">{{ number_format($product->price) }}</span>
              <span class="text-muted"></span>
            </div>
  
            <h5>
              {{ $product->brand->name ?? 'Không xác định' }} 
            </h5>
            <span class="text-success ms-2">Kho còn : {{ $product->stock }} Sản phẩm  </br></span>
            <span class="text-success ms-2">Khuyến mãi: {{ $product->discount }} </span>
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
              {{-- <div class="container mt-3">
                <label class="fw-bold">Màu Sắc</label>
                <div class="d-flex">
                        <div class="color-option">
                            <span>{{ $product->details->color }}</span>
                        </div>
                </div>
            </div> --}}
            <div class="container mt-3">
              <label class="fw-bold">Màu Sắc</label>
              <div class="d-flex">
                  <div class="color-option active">{{ $product->details->color }}</div>
              </div>
          </div>
              
            </div>
            <a href="#" class="btn btn-warning shadow-0">Mua ngay {{ number_format($product->price, 0, ',', '.') }} VNĐ </a>
            <!-- <a href="#" 
               class="btn btn-primary shadow-0 add-to-cart" 
               data-id="{{ $product->id }}" alt="Add to cart">
               <i class="fa-solid fa-cart-plus fa-2xl" style="color: #ffffff;"></i>
            </a> -->
          </div>
        </main>
      </div>
    </div>
  </section>
  <!-- content -->
  <section class="bg-light border-top py-4">
    <div class="container">
      <div class="row gx-4">
        <div class="col-lg-8 mb-4">
          <div class="border rounded-2 px-3 py-2 bg-white">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
              <li class="nav-item d-flex" role="presentation">
                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Mô tả</a>
              </li>
            </ul>
            <!-- Pills navs -->
  
            <!-- Pills content -->
            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <p> {{ $product->description }} </p>
                <table class="table border mt-3 mb-2">
                  <tr>
                    <th class="py-2">Màn hình:</th>
                    <td class="py-2">{{ $product->details->screen_size }}</td>
                  </tr>
                  <tr>
                    <th class="py-2">Camera:</th>
                    <td class="py-2">{{ $product->details->camera }}</td>
                  </tr>
                  <tr>
                    <th class="py-2">Bộ nhớ:</th>
                    <td class="py-2">{{ $product->details->storage_capacity }}</td>
                  </tr>
                  <tr>
                    <th class="py-2">Tính năng</th>
                    <td class="py-2">{{ $product->details->extra_features }}</td>
                  </tr>
                  <tr>
                    <th class="py-2">Color</th>
                    <td class="py-2">{{ $product->details->color }}</td>
                  </tr>
                </table>
            </div>
            <!-- Pills content -->
          </div>
        </div>
      </div>
    </div>
  </section>
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

  <div id="reviews">
    <h3>Đánh giá</h3>
    <div id="review-list"></div>
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
                
@section('scripts')
<script>  
let currentPage = 1;
    let productId = "{{ $product->Id }}"; // Lấy ID sản phẩm từ backend

    function loadReviews(page = 1) {
        fetch(`/reviews/${c}?page=${page}`)
        .then(response => response.json())
        .then(data => {
            let reviewList = document.getElementById("review-list");
            reviewList.innerHTML = ""; // Xóa dữ liệu cũ

            data.data.forEach(review => {
                reviewList.innerHTML += `
                    <div class="review">
                        <strong>${review.user.name}</strong> - ${new Date(review.created_at).toLocaleDateString()}
                        <p>⭐ ${review.rating}/5</p>
                        <p>${review.comment}</p>
                        <hr>
                    </div>`;
            });

            // Xử lý phân trang
            currentPage = data.current_page;
            document.getElementById("currentPage").textContent = currentPage;
            document.getElementById("prevPage").disabled = data.prev_page_url === null;
            document.getElementById("nextPage").disabled = data.next_page_url === null;
        })
        .catch(error => console.error("Lỗi khi tải review:", error));
    }

    document.getElementById("prevPage").addEventListener("click", () => loadReviews(currentPage - 1));
    document.getElementById("nextPage").addEventListener("click", () => loadReviews(currentPage + 1));

    loadReviews(); // Gọi API khi trang tải

//     // Thêm sản phẩm vào giỏ hàng
//     $(document).on('click', '.add-to-cart', function (e) {
//         e.preventDefault();

//         let productId = $(this).data('id');
//         let productName = $(this).data('name');
//         let productPrice = $(this).data('price');
//         let productImage = $(this).data('image'); // Lấy hình ảnh từ data attribute

//         $.ajax({
//             url: "{{ route('cart.add') }}",
//             method: "POST",
//             data: {
//                 _token: "{{ csrf_token() }}",
//                 id: productId,
//                 name: productName,
//                 price: productPrice,
//                 image: productImage // Gửi hình ảnh đến server
//             },
//         });
//     });

</script>
<!-- // <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
  <style>
         /* ProductDetail */
         .color-container {
            display: flex;
            gap: 10px; /* Khoảng cách giữa các màu */
            margin-top: 5px;
        }
        .color-option {
            padding: 5px 10px;
            border: 1px solid #ccc; /* Viền bao bọc */
            border-radius: 5px; /* Bo góc nhẹ */
            cursor: pointer; /* Con trỏ chuột */
            transition: all 0.3s ease; /* Hiệu ứng mượt */
        }
        .color-option:hover {
            border-color: #007bff; /* Đổi màu viền khi hover */
            background-color: #f8f9fa; /* Đổi màu nền khi hover */
        }
        .label {
            font-weight: bold;
        }
  </style>
  @endsection