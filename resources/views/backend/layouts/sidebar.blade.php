  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('home') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Setup</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  @if (auth()->user()->role == 'admin')
                      <li>
                          <a href="{{ route('users.create') }}">
                              <i class="bi bi-circle"></i><span>Users</span>
                          </a>
                      </li>

                      <li>
                          <a href="{{ route('clients.create') }}">
                              <i class="bi bi-circle"></i><span>Clients</span>
                          </a>
                      </li>


                      <li>
                          <a href="{{ route('departments.create') }}">
                              <i class="bi bi-circle"></i><span>Department</span>
                          </a>
                      </li>
                  @endif

                  <li>
                      <a href="{{ route('projects.create') }}">
                          <i class="bi bi-circle"></i><span>Projects</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Components Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Management</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  @if (auth()->user()->role == 'admin')
                      <li>
                          <a href="{{ route('tasks.create') }}">
                              <i class="bi bi-circle"></i><span>Tasks</span>
                          </a>
                      </li>
                  @else
                      <li>
                          <a href="{{ route('tasks.create') }}">
                              <i class="bi bi-circle"></i><span>Tasks</span>
                          </a>
                      </li>
                  @endif

                  @if (auth()->user()->role == 'admin')
                      <li>
                          <a href="#!">
                              <i class="bi bi-circle"></i><span>Ledger</span>
                          </a>
                      </li>
                  @endif

              </ul>
          </li><!-- End Forms Nav -->

          @if (auth()->user()->role == 'admin')
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-layout-text-window-reverse"></i><span>Reports</span><i
                          class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="{{ route('availablity.index') }}">
                              <i class="bi bi-circle"></i><span>Availability</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('timesheet.index') }}">
                              <i class="bi bi-circle"></i><span>Time Sheet</span>
                          </a>
                      </li>
                  </ul>
              </li><!-- End Tables Nav -->
          @endif
      </ul>

  </aside><!-- End Sidebar-->
