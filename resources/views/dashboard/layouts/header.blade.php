<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ToDo List Dashboard</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">
                <span data-feather="log-out"></span></i> Logout
                </button>
            </form>
        </li>
      </ul>
    </nav>