@extends('layouts.master')

@section('title', 'Shopping Cart')
@section('content')

<div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 pb-4">
          <div class="row mb-5">
            <div class="col-lg-12">
              <h2 class="h3 mb-4 text-black">Your Shopping Cart</h2>
            </div>
          </div>

          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  
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
                    <td>${{ number_format($item->product->price) }}</td>
                    <td>
                      <div class="input-group" style="max-width: 120px;">
                        <span class="input-group-btn">
                          <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                        </span>
                        <input type="text" class="form-control text-center quantity-input" 
                               value="{{ $item->quantity }}" 
                               data-id="{{ $item->id }}"
                               aria-label="Example text with button addon" 
                               aria-describedby="button-addon1">
                        <span class="input-group-btn">
                          <button class="btn btn-outline-black increase" type="button">&plus;</button>
                        </span>
                      </div>
                    </td>
                    <td class="product-subtotal">${{ number_format($item->product->price * $item->quantity) }}</td>
                    <td>
                      <button class="btn btn-black btn-sm remove-item" data-id="{{ $item->id }}">
                        <span class="icon-trash"></span>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">Your cart is empty</td>
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
                    <h3 class="h4 text-black mb-3">Cart Total</h3>
                    <p class="mb-2">Subtotal <span class="float-end">${{ isset($subtotal) ? number_format($subtotal) : 0 }}</span></p>
                    <p class="mb-2">Shipping <span class="float-end">${{ isset($shipping) ? number_format($shipping) : 0 }}</span></p>
                    <hr>
                    <p class="mb-2"><strong>Total <span class="float-end">${{ isset($total) ? number_format($total) : 0 }}</span></strong></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-black btn-lg py-3 btn-block">
                    Proceed to Checkout
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

@section('scripts')
<script>
$(document).ready(function() {
  // Increase quantity
  $('.increase').click(function() {
    var input = $(this).closest('.input-group').find('.quantity-input');
    var value = parseInt(input.val()) + 1;
    input.val(value);
    updateQuantity(input.data('id'), value);
  });

  // Decrease quantity
  $('.decrease').click(function() {
    var input = $(this).closest('.input-group').find('.quantity-input');
    var value = parseInt(input.val());
    if (value > 1) {
      value--;
      input.val(value);
      updateQuantity(input.data('id'), value);
    }
  });

  // Remove item
  $('.remove-item').click(function() {
    var id = $(this).data('id');
    if (confirm('Are you sure you want to remove this item?')) {
      $.ajax({
        url: '/cart/' + id,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          location.reload();
        }
      });
    }
  });

  // Update quantity
  function updateQuantity(id, quantity) {
    $.ajax({
      url: '/cart/' + id,
      type: 'PUT',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        quantity: quantity
      },
      success: function(response) {
        location.reload();
      }
    });
  }
});
</script>
@endsection
