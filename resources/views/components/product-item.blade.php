 <!-- Start Column 1 -->
 @props(['products'])
 <div class="col-12 col-md-4 col-lg-3 mb-5">
    <a class="product-item" href="{{ route('productdetail')}}">
        <img src="{{asset('assets/images/product-3.png')}}" class="img-fluid product-thumbnail">
        <h3 class="product-title">Tên sản phẩm</h3>
        <strong class="product-price">Giá sản phẩm</strong>

        <span class="icon-cross">
            <img src="{{asset('assets/images/cross.svg')}}" class="img-fluid">
        </span>
    </a>
</div> 
<!-- End Column 1 -->