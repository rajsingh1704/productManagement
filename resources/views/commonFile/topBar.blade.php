<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('homePage') }}">Product Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
       
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categoriesList') }}">Category</a>
          </li>  
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Product</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('saveProductDetails') }}">New Product</a></li>
              {{-- <li><a class="dropdown-item" href="#">Product List</a></li> --}}
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>