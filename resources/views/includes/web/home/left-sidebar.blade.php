<div class="left-sidebar">
    <h2>Danh mục</h2>
    <div class="panel-group category-products" id="accordian">
         @foreach ($v_categories as $v_category )
            <div class="panel-heading">
                <h4 class="panel-title"><a href="#">{{$v_category->category_name}}</a></h4>
            </div>
        @endforeach
    </div>
    <div class="brands_products">
        <!--brands_products-->
        <h2>Thương hiệu</h2>
        @foreach ($v_brands as $v_brand )
        <div class="panel-heading">
            <h4 class="panel-title"><a href="#">{{$v_brand->brand_name}}</a></h4>
        </div>
        @endforeach

    </div>
    <!--/brands_products-->

    <div class="price-range">
        <!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0"
                data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                id="sl2"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div>
    <!--/price-range-->

    <div class="shipping text-center">
        <!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div>
    <!--/shipping-->

</div>
