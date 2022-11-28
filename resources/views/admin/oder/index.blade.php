@extends('layout.master')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh sách đơn hàng</h1>
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
              <h5 class="card-title">Liệt kê đơn hàng</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <a href="{{ route('oder.exel') }}"
                class="btn btn-sm btn-icon btn-warning">Xuất Exel</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giá</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $oders as $oder )
                    <tr>
                      <th scope="row">{{$oder->id}}</th>
                      <td>{{$oder->name}}</td>
                      <td>{{$oder->address}}</td>
                      <td>{{$oder->phone}}</td>
                      <td>{{$oder->email}}</td>
                      {{-- <td>{{$oder->note}}</td> --}}
                      <td>{{number_format($oder->order_total_price)."VND"}}</td>
                      <td>
                        <form action="" method="post">

                            <a href=""
                                    class="btn btn-sm btn-icon btn-success">Edit</a>
                                    @method('put')
                                    @csrf
                            <button type="submit" onclick="return confirm('bạn muốn chuyển vào thùng rác?');" class="btn btn-sm btn-icon btn-danger">Delete</button>
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
