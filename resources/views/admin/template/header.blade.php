<header id="header" class="navbar">
    <ul class="nav navbar-nav navbar-avatar pull-right">
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs-only">Mika Sokeil</span> <span class="thumb-small avatar inline"><img src="{{asset('vendor/admin/images/avatar.jpg')}}" alt="Mika Sokeil" class="img-circle"></span> <b class="caret hidden-xs-only"></b> </a> 
          <ul class="dropdown-menu pull-right">
             <li><a href="#">Settings</a></li>
             <li><a href="#">Profile</a></li>
             <li><a href="#"><span class="badge bg-danger pull-right">3</span>Notifications</a></li>
             <li class="divider"></li>
             <li><a href="{{ route('logout-khachhang') }}">Đăng xuất</a></li>
          </ul>
       </li>
    </ul>
    <a class="navbar-brand" href="#">Chành xe</a> <button type="button" class="btn btn-link pull-left nav-toggle visible-xs" data-toggle="class:slide-nav slide-nav-left" data-target="body"> <i class="fa fa-bars fa-lg text-default"></i> </button> 
  
    <form class="navbar-form pull-left shift" action="#" data-toggle="shift:appendTo" data-target=".nav-primary"> <i class="fa fa-search text-muted"></i> <input type="text" class="input-sm form-control" placeholder="Tìm kiếm"> </form>
 </header>