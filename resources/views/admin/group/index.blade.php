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
                    <th scope="col">Tên quyền</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $groups as $group )
                    <tr>
                      <th scope="row">{{$group->id}}</th>
                      <td>{{$group->name}}</td>
                      <td>
                        {{-- <form action="" method="post">

                           <a class="btn btn-sm btn-icon btn-success" href="{{route('group.detail', $group->id)}}">Trao Quyền</a>
                                    @method('put')
                                    @csrf
                            <button type="submit" onclick="return confirm('bạn muốn chuyển vào thùng rác?');" class="btn btn-sm btn-icon btn-danger">Delete</button>
                            </form> --}}
                            <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- @if (Auth::user()->hasPermission('Group_update')) --}}
                                <a class="btn btn-sm btn-icon btn-success" href="{{route('group.detail', $group->id)}}">Trao Quyền</a>
                                {{-- @endif --}}
                                {{-- @if (Auth::user()->hasPermission('Group_update'))
                                <a href="{{ route('group.edit', $group->id) }}"
                                    class="btn btn-sm btn-icon btn-success">Sửa</a>
                                @endif --}}
                                    {{-- @if (Auth::user()->hasPermission('Group_forcedelete '))
                                    <a data-href="{{ route('group.destroy', $group->id) }}"
                                        id="{{ $group->id }}" class="btn btn-sm btn-icon btn-success">Xóa</a>
                                    @endif --}}
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
