<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('company.index') }}">View all companies<span class="sr-only"></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('employee.index') }}">View all employees<span class="sr-only"></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('company.create') }}">Create company<span class="sr-only"></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('employee.create') }}">Create employee<span class="sr-only"></span></a>
      </li>

  
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login.form') }}">Log In<span class="sr-only"></span></a>
      </li>

      

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.logout') }}">Log Out<span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>