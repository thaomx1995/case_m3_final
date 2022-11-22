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
                        <h5 class="card-title">Thêm nhân viên</h5>

                        <!-- No Labels Form -->
                        <form action="{{ route('user.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhân viên">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror




                            {{-- <div class="col-md-4">
                    <select name="brand_status" class="form-select" >
                        <option selected></option>
                        <option value="1">Kích hoạt</option>
                        <option value="0">không kích hoạt</option>
                    </select>
                </div> --}}
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
