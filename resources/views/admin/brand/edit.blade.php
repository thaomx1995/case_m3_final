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
              <h5 class="card-title">Thêm thương hiệu</h5>

              <!-- No Labels Form -->
              <form action="{{route('brand.update',$brands->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-10">
                  <input type="text" class="form-control" value="{{ old('brand_name') ?? $brands->brand_name}}" name="brand_name" placeholder="Tên danh mục">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" value="{{ old('brand_desc') ?? $brands->brand_desc}}" name="brand_desc" placeholder="Mô tả">
                </div>
                <div class="col-md-4">
                    <select name="brand_status" class="form-select" >
                        @if ($brands->brand_status == 0)
                        <option selected value="0">không kích hoạt</option>
                        <option  value="1">Kích hoạt</option>
                        @else
                        <option  value="0">không kích hoạt</option>
                        <option selected value="1">Kích hoạt</option>
                    @endif
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
