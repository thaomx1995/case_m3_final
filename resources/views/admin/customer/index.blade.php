@extends('layout.master')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh mục</h1>
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
              <h5 class="card-title">Liệt kê khách hàng</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $customers as $customer )
                    <tr>
                      <th scope="row">{{$customer->id}}</th>
                      <td>{{$customer->name}}</td>
                      <td>{{$customer->phone}}</td>
                      <td>{{$customer->email}}</td>
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
