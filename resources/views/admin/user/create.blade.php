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
                        <form action="{{ route('user.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-17">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhân viên">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="text" class="form-control" name="email" placeholder="email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="text" class="form-control" name="password" placeholder="password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="text" class="form-control" name="address" placeholder="address">
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="number" class="form-control" name="phone" placeholder="phone">
                            </div>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="file" class="form-control" name="image"
                                    placeholder="Hình ảnh ">
                                <img type='hidden' src="{{ asset('public/images/') }}" id="exampleInputPassword1" height="100"
                                    width="80">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                            <select name="gender" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach --}}
                            </select>
                            </div>

                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                                <input type="date" class="form-control" name="birthday" placeholder="birthday">
                            </div>
                            @error('birthday')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-17">
                            <select name="group_id" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            @error('group_id')
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
