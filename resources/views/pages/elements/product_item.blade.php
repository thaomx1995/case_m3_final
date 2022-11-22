<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="{{asset('public/images/'.$product->product_image)}}" alt="" width="20" height="330" />
            <p>{{$product->product_name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i
                    class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
        </div>
    </div>
    <div class="choose">
        <ul class="nav nav-pills nav-justified">
            <li><a href="{{route('web_product.show',$product->id)}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
        </ul>
    </div>
</div>
