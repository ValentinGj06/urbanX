<!-- <nav class="navbar navbar-expand navbar-dark bg-primary mb-3">     
    <div class="navbar-nav w-100">
        <a class="navbar-brand text-color" href="/">Home</a>
        <a class="nav-item nav-link" href="/companies">Browse Companies</a>
        <a class="nav-item nav-link" href="/employees">Browse Employees</a>
    </div>
</nav> -->
<style type="text/css">
	/* Sidebar */
#sidebar-wrapper{
  z-index:1;
  position: fixed;
  width:0;
  height:100vh;
  overflow-y:hidden;
  background: #382525;
  opacity:0.9;
	transition:all .5s;
	display:flex;
	align-items:center;
}

/* Main Content */
#page-content-wrapper{
  width: 100%;	
  position: absolute;
  padding:15px;
	transition:all .5s;
}

#menu-toggle{
	transition:all .3s;
	font-size:2em;
}
/* Change the width of the sidebar to display it*/
#wrapper.menuDisplayed #sidebar-wrapper{
  width:250px;
}

#wrapper.menuDisplayed #page-content-wrapper{
  padding-left:250px;
}

/* Sidebar styling */
.sidebar-nav{
  padding:0;
  list-style:none; 
	transition:all .5s;
	width:100%;
	text-align:center;
}

.sidebar-nav li{
  line-height:40px;  
	width:100%;
	transition:all .3s;
	padding:10px;
}

.sidebar-nav li a {
  display:block;
  text-decoration:none;
  color:#b8a0a0;
}

.sidebar-nav li:hover{
  background:#846bab;
}


</style>
<div id="wrapper" class="menuDisplayed">
<!-- Sidebar -->
<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <div id="logo"><a class="navbar-brand text-color" href="/home"><img src="{{ asset('img/logo.png') }}"></a></div>  
    <li><a class="navbar-brand text-color" href="/home">Home</a></li>
    <li><a class="navbar-brand text-color" href="{{ route('users.index') }}">Admin</a></li>
    <li><a class="nav-item nav-link" href="/locations/create">Add Location</a></li>
    <li><a class="nav-item nav-link" href="/locations">Browse Locations</a></li>
    <li><a class="nav-item nav-link" href="/cars">Browse Cars</a></li>
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    	@else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
  </ul>
</div>

<!-- Page Content -->
<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <a href="#" class="btn" id="menu-toggle"><img src="{{ asset('img/menu.png') }}"></a>
        <main>@yield('content')</main>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("menuDisplayed");
  });
});

</script>