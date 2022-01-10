<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' :'' }}" href="/dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/todos*')||Request::is('dashboard/fileupload/create') ? 'active' :'' }}" href="/dashboard/todos">
                  <span data-feather="file-text"></span>
                  Todos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/fileupload') ? 'active' :'' }}" href="/dashboard/fileupload">
                  <span data-feather="file-text"></span>
                  Image Uploads
                </a>
              </li>
            </ul>

            @can('admin')
            
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashbord/users*')? 'active' : '' }}" href="/dashboard/users">
                    <span data-feather="shield"></span>
                    My Admin
                  </a>
                </li>
              </ul>
            @endcan
            
          </div>
</nav>