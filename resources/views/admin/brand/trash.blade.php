@extends('layout.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Thùng rác</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">General</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="col-lg-15">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Những mục đã xóa</h5>
                    @if (!count($brands))
                        <p class="text-success">
                        <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                            không có gì trong thùng rác.
                        </div>
                        </p>
                    @endif
                    @if (Session::has('success'))
                        <p class="text-success">
                        <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}</div>
                        </p>
                    @endif
                    @if (Session::has('error'))
                        <p class="text-danger">
                        <div class="alert alert-danger"> <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('error') }}</div>
                        </p>
                    @endif
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Mô tả thương hiệu</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brand->id }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_desc }}</td>
                                    <td>{{ $brand->brand_status }}</td>
                                    <td>
                                        {{-- <form action="{{ route('category.restoredelete', $category->id) }}" method="POST">
                            @csrf
                            @method('put')

                                <button type="submit" class="w3-button w3-blue" onclick="return confirm('Bạn muốn khôi phục?')">Khôi Phục</button>

                                <a type="submit" data-href="{{ route('category.destroy', $category->id) }}"
                                  class="w3-button w3-red sm deleteIcon" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </form> --}}
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">
                                                    <form action="{{ route('brand.destroy', $brand->id) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm('bạn muốn xóa ?');"
                                                            class="btn btn-sm btn-icon btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                                <form action="{{ route('brand.restoredelete', $brand->id) }}"
                                                    method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button onclick="return confirm('bạn muốn khôi phục ?');"
                                                        class="btn btn-sm btn-icon btn-success">Khôi phục</button>
                                                </form>
                                            </div>
                                        </div>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    @endsection
