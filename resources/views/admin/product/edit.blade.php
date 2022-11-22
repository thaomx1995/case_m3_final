@extends('layout.master')
@section('content')

    <body>
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Form Layouts</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Layouts</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-6">



                        <!-- Vertical Form -->


                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sửa sản phẩm</h5>

                        <!-- No Labels Form -->
                        <form action="{{ route('product.update', $products->id) }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="text" class="form-control"
                                    value="{{ old('product_name') ?? $products->product_name }}" name="product_name"
                                    placeholder="Tên sản phẩm">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control"
                                    value="{{ old('product_price') ?? $products->product_price }}" name="product_price"
                                    placeholder="Giá sản phẩm">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="product_image"
                                    placeholder="Hình ảnh sản phẩm">
                                <img src="{{ asset('public/images/' . $products->product_image) }}" height="100"
                                    width="80">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control"
                                    value="{{ old('product_desc') ?? $products->product_desc }}" name="product_desc"
                                    placeholder="Mô tả sản phẩm">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control"
                                    value="{{ old('product_content') ?? $products->product_content }}"
                                    name="product_content" placeholder="Nội dung sản phẩm">
                            </div>
                            <div class="mb-3">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-select">
                                    {{-- <option selected></option>
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option> --}}
                                    @foreach ($categorys as $category)
                                        <option {{ $category->id == $products->brand_id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Thương hiệu sản phẩm</label>
                                <select name="brand_id" class="form-select">
                                    {{-- <option selected></option>
                            <option value="1"></option>
                            <option value="0"></option> --}}
                                    @foreach ($brands as $brand)
                                        <option {{ $brand->id == $products->category_id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Trạng thái</label>

                                <select name="product_status" class="form-select">
                                    @if ($products->product_status == 0)
                                        <option selected value="0">không kích hoạt</option>
                                        <option value="1">Kích hoạt</option>
                                    @else
                                        <option value="0">không kích hoạt</option>
                                        <option selected value="1">Kích hoạt</option>
                                    @endif
                                    </option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End No Labels Form -->

                    </div>
                </div>



                </div>
                </div>
            </section>

        </main>

    </body>

    </html>
@endsection
