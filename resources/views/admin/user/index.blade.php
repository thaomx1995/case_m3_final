@extends('layout.master')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Nhân viên</h1>
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
              <h5 class="card-title">Liệt kê nhân viên</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user )
                    <tr>
                      <th scope="row">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      {{-- <td>
                          @if ($user->brand_status == 0)
                              <span class="text text-danger">không kích hoạt</span>
                              @else
                              <span class="text text-success">kích hoạt</span>
                          @endif
                      </td> --}}
                      <td>
                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <a href="{{ route('user.edit', $user->id) }}"
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
