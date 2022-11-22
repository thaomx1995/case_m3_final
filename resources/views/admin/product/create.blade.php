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
                        <h5 class="card-title">Thêm sản phẩm</h5>

                        <!-- No Labels Form -->
                        <form action="{{ route('product.store') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">
                            </div>
                            @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm">
                            </div>
                            @error('product_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <input type="file" class="form-control" name="product_image"
                                    placeholder="Hình ảnh sản phẩm">
                                <img src="{{ asset('public/images/') }}" id="exampleInputPassword1" height="100"
                                    width="80">
                            </div>
                            @error('product_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <input type="text" class="form-control" name="product_desc" placeholder="Mô tả sản phẩm">
                            </div>
                            @error('product_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <input type="text" class="form-control" name="product_content"
                                    placeholder="Nội dung sản phẩm">
                            </div>
                            @error('product_content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-select">
                                    {{-- <option selected></option>
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option> --}}
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="">Thương hiệu sản phẩm</label>
                                <select name="brand_id" class="form-select">
                                    {{-- <option selected></option>
                            <option value="1"></option>
                            <option value="0"></option> --}}
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="">Trạng thái</label>
                                <select name="product_status" class="form-select">
                                    <option selected></option>
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">không kích hoạt</option>
                                </select>
                            </div>
                            @error('product_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
