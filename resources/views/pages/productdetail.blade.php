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
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  4.5
                </span>
              </div>
              <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>Đã bán: 0</span>
            </div>
  
            <div class="mb-3">
              <span class="h5">{{ number_format($product->price) }}</span>
              <span class="text-muted"></span>
            </div>
  
            <p>
              {{ $product->description }}
            </p>
            <span class="text-success ms-2">Khuyến mãi: {{ $product->discount }}</br> </span>
            <span class="text-success ms-2">Kho còn : {{ $product->stock }}_Sản phẩm</span>

  
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
@endsection