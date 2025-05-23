<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
            <i class="mdi mdi-cart  menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" 
            href="#category" 
            aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}" 
            aria-controls="category">
            <i class="mdi mdi-view-list  menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="category">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="/admin/category/create">Add Category</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="/admin/category">View Category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse"
             href="#products" 
             aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}" >
            <i class="mdi mdi-package-variant-closed  menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Add Product</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">View Product</a></li>
              </ul>
            </div>
</li>
       



          <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" 
            href="#users" 
            aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}" 
            aria-controls="category">
            <i class="mdi mdi-view-list  menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="users">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}" href="/admin/users/create">Add User</a></li>
                <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}" href="/admin/users">View Users</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
            <i class="mdi mdi-view-carousel  menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>
    
          <li class="nav-item {{ Request::is('admin/reviews') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/reviews') }}">
              <i class="mdi mdi-star-outline menu-icon"></i>
              <span class="menu-title">Reviews</span>
            </a>
          </li>
          
                    <li class="nav-item {{ Request::is('admin/promocode') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/promocode') }}">
              <i class="mdi mdi-ticket-percent menu-icon"></i>

              <span class="menu-title">PromoCode </span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/blogs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/blogs') }}">
                <i class="mdi mdi-book-open-variant menu-icon"></i>
                <span class="menu-title">Blogs</span>
            </a>
        </li>
        
          <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
            <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Site Setting</span>
            </a>
          </li>

        </ul>
      </nav>