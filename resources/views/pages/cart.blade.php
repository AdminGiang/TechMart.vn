@extends('layouts.master')

@section('title', 'Giỏ hàng')
@section('content')

<div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 pb-4">
          <div class="row mb-5">
            <div class="col-lg-12">
              <h2 class="h3 mb-4 text-black">Giỏ hàng của bạn</h2>
            </div>
          </div>

          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Hình ảnh</th>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng</th>
                  <th>Xóa</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($cartItems) && count($cartItems) > 0)
                  @foreach($cartItems as $item)
                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{ $item->product->image }}" alt="Image" class="img-fluid" style="max-width: 100px;">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $item->product->name }}</h2>
                    </td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                    <td>
                      <div class="input-group" style="max-width: 120px;">
                        <span class="input-group-btn">
                          <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                        </span>
                        <input type="text" class="form-control text-center quantity-input" 
                               value="{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VND" 
                               data-id="{{ $item->id }}"
                               aria-label="Example text with button addon" 
                               aria-describedby="button-addon1">
                        <span class="input-group-btn">
                          <button class="btn btn-outline-black increase" type="button">&plus;</button>
                        </span>
                      </div>
                    </td>
                    <td class="product-subtotal">{{ number_format($item->product->price * $item->quantity) }}đ</td>
                    <td>
                      <button class="btn btn-black btn-sm remove-item" data-id="{{ $item->id }}">
                        <span class="icon-trash"></span>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">Giỏ hàng trống</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>

          <div class="row justify-content-end mt-5">
            <div class="col-md-4">
              <div class="row mb-5">
                <div class="col-md-12">
                  <div class="p-4 border rounded">
                    <h3 class="h4 text-black mb-3">Tổng giỏ hàng</h3>
                    <p class="mb-2">Tạm tính <span class="float-end">{{ isset($subtotal) ? number_format($subtotal) : 0 }}đ</span></p>
                    <p class="mb-2">Phí vận chuyển <span class="float-end">{{ isset($shipping) ? number_format($shipping) : 0 }}đ</span></p>
                    <hr>
                    <p class="mb-2"><strong>Tổng cộng <span class="float-end">{{ isset($total) ? number_format($total) : 0 }}đ</span></strong></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-black btn-lg py-3 btn-block">
                    Tiến hành thanh toán
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

