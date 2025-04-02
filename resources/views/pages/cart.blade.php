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
            <table class="table table-bordered">
              @if($cartItems->count() > 0)
                <thead class="thead-light">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->product->image }}" style="width: 100px; height: auto; border-radius: 8px;">
                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ number_format($item->price) }} VND</td>
                            <td>
                              <input type="number" class="form-control update-quantity" 
                                    data-id="{{ $item->product_id }}" 
                                    value="{{ $item->quantity }}" 
                                    min="1">
                            </td>
                            <td class="item-total">
                                <span id="product-total-{{ $item->product_id }}">
                                    {{ number_format($item->price * $item->quantity) }} VND
                                </span>
                            </td>                            
                            <td>
                                <button class="btn btn-danger btn-sm remove-from-cart" 
                                        data-id="{{ $item->product_id }}">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              @else
                <p class="text-center">Giỏ hàng của bạn đang trống.</p>
              @endif
            </table>
          </div>

          {{-- Mã giảm giá --}}
          
          {{-- Mã giảm giá --}}


          <div class="row justify-content-end mt-5">
            <div class="col-md-4">
              <div class="p-4 border rounded bg-light">
                <h3 class="h4 text-black mb-3">Tổng giỏ hàng</h3>
                <p class="mb-2">Tạm tính: <span class="float-end" id="subtotal">{{ number_format($totalPrice) }} VND</span></p>
                
                @if($cartItems->count() > 0)
                    <p class="mb-2">Phí vận chuyển: <span class="float-end" id="shipping">{{ number_format($shipping) }} VND</span></p>
                    <hr>
                    <p class="mb-2"><strong>Tổng cộng: <span class="float-end" id="total">{{ number_format($total) }} VND</span></strong></p>
                    <a href="{{ route('checkout') }}" class="btn btn-success btn-lg py-3 btn-block">Tiến hành thanh toán</a>
                @else
                    <p class="text-center text-muted">Không có sản phẩm trong giỏ hàng.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Cập nhật số lượng
    $('.update-quantity').change(function() {
        var productId = $(this).data('id');
        var quantity = $(this).val();
        
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            }
        });
    });

    // Xóa sản phẩm
    $('.remove-from-cart').click(function() {
        var productId = $(this).data('id');
        
        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            }
        });
    });
});
</script>

@endsection

