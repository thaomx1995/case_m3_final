@extends('layout.master')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Slider</h1>
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
              <h5 class="card-title">Liệt kê slide</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $sliders as $slider )
                    <tr>
                      <th scope="row">{{$slider->id}}</th>
                      <td ><img src="{{asset('public/images/'.$product->product_image)}}" height="100" width="80"></td>
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
