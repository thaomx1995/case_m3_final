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
              <h5 class="card-title">Liệt kê danh mục</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Age</th>
                    <th scope="col">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $categorys as $category )
                    <tr>
                      <th scope="row">{{$category->id}}</th>
                      <td>{{$category->category_name}}</td>
                      <td>{{$category->category_desc}}</td>
                      <td>
                          @if ($category->category_status == 0)
                              <span class="text text-danger">không kích hoạt</span>
                              @else
                              <span class="text text-success">kích hoạt</span>
                          @endif
                      </td>
                      <td>
                        <form action="{{route('category.softdeletes',$category->id)}}" method="post">

                            <a href="{{ route('category.edit', $category->id) }}"
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
