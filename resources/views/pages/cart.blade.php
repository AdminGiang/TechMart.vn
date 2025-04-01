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
              @if(!empty($cart) && count($cart) > 0)
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
                    @foreach($cart as $productId => $item)
                        <tr>
                            <td>
                                <img src="{{ $item['image'] }}" style="width: 100px; height: auto; border-radius: 8px;">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price']) }} VND</td>
                            <td>
                              <input type="number" class="form-control update-quantity" 
                                    data-id="{{ $productId }}" 
                                    value="{{ $item['quantity'] }}" 
                                    min="1">
                            </td>
                            <td class="item-total">
                                <span id="product-total-{{ $productId }}">
                                    {{ number_format($item['price'] * $item['quantity']) }} VND
                                </span>
                            </td>                            
                            <td>
                                <button class="btn btn-danger btn-sm remove-from-cart" 
                                        data-id="{{ $productId }}">
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

          <div class="row justify-content-end mt-5">
            <div class="col-md-4">
              <div class="p-4 border rounded bg-light">
                <h3 class="h4 text-black mb-3">Tổng giỏ hàng</h3>
                <p class="mb-2">Tạm tính: <span class="float-end" id="subtotal">{{ number_format($totalPrice) }} VND</span></p>
                
                @if(!empty($cart) && count($cart) > 0)
                    <p class="mb-2">Phí vận chuyển: <span class="float-end" id="shipping">{{ number_format($shipping) }} VND</span></p>
                    <hr>
                    <p class="mb-2"><strong>Tổng cộng: <span class="float-end" id="total">{{ number_format($total) }} VND</span></strong></p>
                    <button class="btn btn-success btn-lg py-3 btn-block">Tiến hành thanh toán</button>
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
   $(document).on('change', '.update-quantity', function () {
        let productId = $(this).data('id');
        let quantity = $(this).val();

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Cập nhật tổng tiền cho sản phẩm
                $(`input[data-id="${productId}"]`).closest('tr').find('.item-total').text(
                    new Intl.NumberFormat().format(response.itemTotal) + ' VND'
                );

                // Cập nhật tạm tính
                $('#subtotal').text(
                    new Intl.NumberFormat().format(response.totalPrice) + ' VND'
                );

                // Cập nhật tổng cộng
                $('#total').text(
                    new Intl.NumberFormat().format(response.total) + ' VND'
                );

                // Kiểm tra nếu giỏ hàng trống
                if ($('tbody tr').length === 0) {
                    $('#shipping').closest('p').hide(); // Ẩn phí vận chuyển
                    $('#total').closest('p').hide(); // Ẩn tổng cộng
                } else {
                    $('#shipping').closest('p').show(); // Hiển thị phí vận chuyển
                    $('#total').closest('p').show(); // Hiển thị tổng cộng
                }
            },
            error: function () {
                alert('Đã xảy ra lỗi, vui lòng thử lại!');
            }
        });
    });
    $(document).on('click', '.remove-from-cart', function (e) {
        e.preventDefault();

        let productId = $(this).data('id');

        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: productId
            },
            success: function (response) {
                // Xóa dòng sản phẩm khỏi bảng
                $(`button[data-id="${productId}"]`).closest('tr').remove();

                // Cập nhật tạm tính
                $('#subtotal').text(
                    new Intl.NumberFormat().format(response.totalPrice) + ' VND'
                );

                // Cập nhật tổng cộng
                $('#total').text(
                    new Intl.NumberFormat().format(response.total) + ' VND'
                );

                // Kiểm tra nếu giỏ hàng trống
                if ($('tbody tr').length === 0) {
                    $('table').remove();
                    $('.site-blocks-table').html('<p class="text-center">Giỏ hàng của bạn đang trống.</p>');
                    $('#shipping').closest('p').hide(); // Ẩn phí vận chuyển
                    $('#total').closest('p').hide(); // Ẩn tổng cộng
                }
            },
            error: function () {
                alert('Đã xảy ra lỗi, vui lòng thử lại!');
            }
        });
    });
</script>

@endsection

