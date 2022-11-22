<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{asset('public/images/'.$show_products->product_image)}}" alt="" width="90" height="330" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">


        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$show_products->product_name}}</h2>
            <p>Mã sản phẩm: {{$show_products->id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>{{$show_products->product_price}}</span>
                <label>Quantity:</label>
                <input type="text" value="3" />
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </span>
            <p><b>Mô tả:</b>{{$show_products->product_desc}}</p>
            <p><b>Danh mục:</b>{{$show_products->category->category_name}}</p>
            <p><b>Thương hiệu:</b>{{$show_products->brand->brand_name}}</p>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
