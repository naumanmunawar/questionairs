      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <li>
              <a class="active" href="">
                <i class="fa fa-dashboard"></i>
                <span >Dashboard</span>
              </a>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" >
                <i class="fa fa-tags"></i>
                <span>Questionairs</span>
              </a>
              <ul class="sub">
                <li><a  href="{{ url('/questionairs/create') }}">Create</a></li>
                <li><a  href="{{ url('/questionairs/') }}">View</a></li>
              </ul>
            </li>

          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->