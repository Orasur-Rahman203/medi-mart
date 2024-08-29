<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('backend_dashboard')}}">
          <i class="bi bi-grid" style="color:rgba(70,99,202,255)"></i>
          <span style="color:rgba(70,99,202,255)">Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cart-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Cart</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="cart-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('cart_index')}}" >
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Cart List</span>
            </a>
          </li>
          <li>
            <a href="{{route('cart_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Cart Create</span>
            </a>
          </li>       
        </ul>
      </li><!-- End Cart Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Category</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('category_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Category List</span>
            </a>
          </li>
          <li>
            <a href="{{route('category_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Category Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Company</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="company-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('company_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Company List</span>
            </a>
          </li>
          <li>
            <a href="{{route('company_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Company Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#medicine-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Medicine</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="medicine-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('medicine_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)" >Medicine List</span>
            </a>
          </li>
          <li>
            <a href="{{route('medicine_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Medicine Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
     
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Order</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('order_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Order List</span>
            </a>
          </li>
          <li>
            <a href="{{route('order_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Order Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#slider-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Slider</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="slider-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('slider_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Slider List</span>
            </a>
          </li>
          <li>
            <a href="{{route('slider_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Slider Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->


      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#User-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">User</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="User-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user_list')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">User List</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#vendor-nav" data-bs-toggle="collapse" href="#">
         <span style="color:rgba(70,99,202,255)">Vendor</span><i class="bi bi-chevron-down ms-auto" style="color:rgba(70,99,202,255)"></i>
        </a>
        <ul id="vendor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('vendor_index')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Vendor List</span>
            </a>
          </li>
          <li>
            <a href="{{route('vendor_create')}}">
              <i class="bi bi-circle" style="color:rgba(55,180,236,255)"></i><span style="color:rgba(55,180,236,255)">Vendor Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside>