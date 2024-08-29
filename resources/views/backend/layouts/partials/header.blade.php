<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between" >
    

        <a href="{{route('frontend_home')}}" class=" d-flex align-items-center"><img src="{{asset('ui/frontend')}}/assets/imgs/logo/medi.png" style="height: 80px" alt="logo"></a>
       
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color:rgba(70,99,202,255)"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="GET" action="" >
        <input type="text"   placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search" style="color:rgba(70,99,202,255)"></i></button>
      </form>
    </div><!-- End Search Bar -->
    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      
     
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="{{asset('ui/backend')}}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:rgba(70,99,202,255)">{{  auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li>
                                    <a href="{{route('logout')}}"><h5 class="ps-2">Sign Out</h5></a>    
                                </li>
                            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>