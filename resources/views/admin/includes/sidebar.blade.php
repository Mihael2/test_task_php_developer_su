<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index')}}" class="brand-link">
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>
    <div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
            <a href="{{ route('admin.blog.index')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Blog
              </p>
            </a>
          </li>
    <li class="nav-item">
            <a href="{{ route('admin.article.index')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Articles
              </p>
            </a>
          </li>
    </ul>      
    </div>

  </aside>