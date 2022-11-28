<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Danh mục</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('category.create')}}">
              <i class="bi bi-circle"></i><span>Thêm mới danh mục</span>
            </a>
          </li>
          <li>
            <a href="{{route('category.index')}}">
              <i class="bi bi-circle"></i><span>Liệt kê danh mục sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('category.trash')}}">
              <i class="bi bi-circle"></i><span>Thùng rác danh mục</span>
            </a>
          </li>














        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Nhãn hiệu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('brand.create')}}">
              <i class="bi bi-circle"></i><span>Thêm nhãn hiệu</span>
            </a>
          </li>
          <li>
            <a href="{{route('brand.index')}}">
              <i class="bi bi-circle"></i><span>Liệt kê nhãn hiệu</span>
            </a>
          </li>
          <li>
            <a href="{{route('brand.trash')}}">
              <i class="bi bi-circle"></i><span>Thùng rác thương hiệu</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('product.create')}}">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.index')}}">
              <i class="bi bi-circle"></i><span>Liệt kê sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('product.trash')}}">
              <i class="bi bi-circle"></i><span>Thùng rác sản phẩm</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Nhân viên</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.create')}}">
                <i class="bi bi-circle"></i><span>Thêm nhân viên</span>
              </a>
          </li>
          <li>
            <a href="{{route('user.index')}}">
                <i class="bi bi-circle"></i><span>Liệt kê nhân viên</span>
              </a>
          </li>

        </ul>
      </li><!-- End Charts Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Khách hàng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('customer.index')}}">
              <i class="bi bi-circle"></i><span>Liệt kê khách hàng</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ok-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Group</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ok-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('group.index')}}">
              <i class="bi bi-circle"></i><span>Liệt kê quyền</span>
            </a>
          </li>
          <li>
            <a href="{{route('group.create')}}">
              <i class="bi bi-circle"></i><span>Thêm tên quyền</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('oder.index')}}">
          <i class="bi bi-envelope"></i>
          <span>Đơn hàng</span>
        </a>
      </li><!-- End Contact Page Nav -->

     {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav --> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside>
