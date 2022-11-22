@extends('layout.master')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sản phẩm</h1>
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
              <h5 class="card-title">Liệt kê sản phẩm</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product )
                    <tr>
                      <th scope="row">{{$product->id}}</th>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_desc}}</td>
                      <td ><img src="{{asset('public/images/'.$product->product_image)}}" height="100" width="80"></td>
                      <td>
                          @if ($product->product_status == 0)
                              <span class="text text-danger">không kích hoạt</span>
                              @else
                              <span class="text text-success">kích hoạt</span>
                          @endif
                      </td>
                      <td>
                        <form action="{{route('product.destroy',$product->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-sm btn-icon btn-success">Edit</a>
                            <button onclick="return confirm('bạn muốn xóa truyện này?');" class="btn btn-sm btn-icon btn-danger">Delete</button>
                            </form>
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
