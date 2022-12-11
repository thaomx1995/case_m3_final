<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> <div class="form-group form-row filter-row">
                <div class="col-lg-4">
                    <label class="">Tên sản phẩm</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="product_name"
                            class="form-control filter-column f-name" value="{{ $f_product_name }}" />
                    </div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-4">
                    <label class="">Giá</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="product_price"
                            class="form-control filter-column f-name" value="{{ $f_product_price }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-4">
                    <label class="">Mã sản phẩm</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="id"
                            class="form-control filter-column f-name" value="{{ $f_id }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-4">
                    <label class=""> danh mục</label>
                </div>
                <div class="col-lg-12">
                    <select name="category_id" id="" class="form-control">
                        <option value="">-</option>
                        @foreach ($f_categorys as $category )
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                       </select>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-4">
                    <label class="">Thương hiệu</label>
                </div>
                <div class="col-lg-12">
                    <select name="brand_id" id="" class="form-control">
                        <option value="">-</option>
                        @foreach ($f_brands as $brand )
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endforeach
                       </select>
                </div>
            </div>
            </div>
            <div class="modal-footer"> <button type="submit" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Áp dụng</button></div>
        </div>
    </div>
</div>
