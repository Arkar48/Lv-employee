<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          @auth
            @can('isAdmin')
              <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="{{route('branch.index')}}" class="nav-link px-2 text-secondary">Branches</a></li>
              <li><a href="{{route('employee.index')}}" class="nav-link px-2 text-secondary">Employee</a></li>
              @elsecan('isManager')
              <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="{{route('branch.index')}}" class="nav-link px-2 text-secondary">Branches</a></li>
              <li><a href="{{route('employee.index')}}" class="nav-link px-2 text-secondary">Employee</a></li>
              @elsecan('isBranchManager')
              <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="{{route('branch.index')}}" class="nav-link px-2 text-secondary">Branches</a></li>
              <li><a href="{{route('employee.index')}}" class="nav-link px-2 text-secondary">Branch Employee</a></li>
              @else
              <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
            @endcan
          @endauth
          @guest
            <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          @endguest
          
        </ul>
  
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control"  placeholder="Search..." aria-label="Search">
        </form>
  
        @auth
            <p class="mt-2 me-2">{{auth()->user()->name}}</p>
            <a href="{{route('logout')}}" class="btn btn-light btn-outline-primary me-2">Logout</a>
        @endauth

        @guest
            <a href="{{route('login.show')}}" class="btn btn-light btn-outline-primary me-2">Log in</a>
            <a href="{{route('register.show')}}" class="btn btn-light btn-outline-primary me-2">Sign-up</a>
        @endguest
        
            
      </div>
    </div>

</header>