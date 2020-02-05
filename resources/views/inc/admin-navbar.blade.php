
<div  lass="hidden-lg-down">
<div id="mySidenav" class="sidenav">
<a style="padding:.70em;font-size:60px;cursor:pointer;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="menu">
  @guest
  <a class="menu-list wow animated fadeInRight" data-wow-delay="1.3s" href="{{ route('login') }}">Login</a>
  @else
  <a class="username" href="/home">{{ Auth::user()->name }}</i></a>
  <hr class="orange-hr">
  @if(Auth::user()->role == 'Igoara')
  <a href="/igoaradb" class="animated fadeInRight"><i class="fa fa-tachometer orange"></i> DASHBOARD</a>
  <a href="/igoaramemberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> MEMBERS</a>
@endif
@if(Auth::user()->role == 'Loop')
<a href="/loopdb" class="animated fadeInRight"><i class="fa fa-tachometer orange"></i> DASHBOARD</a>
<a href="/loopmemberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> MEMBERS</a>
@endif
@if(Auth::user()->role == 'Cisco')
<a href="/ciscodb" class="animated fadeInRight"><i class="fa fa-tachometer orange"></i> DASHBOARD</a>
<a href="/ciscomemberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> MEMBERS</a>
@endif
@if(Auth::user()->role == 'CodeGeeks')
<a href="/codegeeksdb" class="animated fadeInRight"><i class="fa fa-tachometer orange"></i> DASHBOARD</a>
<a href="/codegeeksmemberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> MEMBERS</a>
@endif
@if(Auth::user()->role == 'AccessPoint')
<a href="/accesspointdb" class="animated fadeInRight"><i class="fa fa-tachometer orange"></i> DASHBOARD</a>
<a href="/accesspointmemberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> MEMBERS</a>
@endif
@if(Auth::user()->role == 'Faculty')
<a href="/articledb" class="animated fadeInRight"><i class="fa fa-list orange"></i> ARTICLES</a>
@endif
@if(Auth::user()->role == 'admin')
<a href="/memberdb" class="animated fadeInRight"><i class="fa fa-users orange"></i> FACULTY MEMBER</a>
@endif
@if(Auth::user()->role == 'admin')
<a class="animated fadeInRight" href="{{ route('register') }}"><i class="fa fa-plus orange"></i> ADD ACCOUNT</a>
@endif
@if(Auth::user()->role == 'admin')
<a class="animated fadeInRight" href="/user"><i class="fa fa-key orange"></i> USER LOGS</a>
@endif
@if(Auth::user()->role == 'admin')
<a class="animated fadeInRight" href="/posts/archive"><i class="fa fa-copy orange"></i> ARCHIVE</a>
@endif
 <a class="animated fadeInRight" href="{{ route('logout') }}"
 onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
  <i class="fa fa-sign-in orange"></i> LOGOUT
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

@endguest
  </div>
</div>
<span style="padding:2em;font-size:30px;cursor:pointer; top:0; right:0; position:absolute; z-index:1000; color:#fd5c02;" onclick="openNav()" id="openNav">MENU &#9776;</span>
</div>

<div class="hidden-md-up">
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><span class="white">HAU-</span><span class="orange">CICT</span></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/"><span class="gray">Home</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/about"><span class="gray">ABOUT</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/about"><span class="gray">NEWS &amp; ARTICLES</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#" id="orgs"><span class="gray">ORGANIZATION&nbsp;<i class="fa fa-caret-down"></i></span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" class="orgs" href="/accesspoint">&nbsp;&nbsp;&nbsp;<span class="gray"><span class="orange">&bull;</span> ACCESS POINT</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" class="orgs" href="/cisco">&nbsp;&nbsp;&nbsp;<span class="gray"><span class="orange">&bull;</span> CISCO</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" class="orgs" href="/codegeeks">&nbsp;&nbsp;&nbsp;<span class="gray"><span class="orange">&bull;</span> CODE GEEKS</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" class="orgs" href="/igoara">&nbsp;&nbsp;&nbsp;<span class="gray"><span class="orange">&bull;</span> IGOARA</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" class="orgs" href="/loop">&nbsp;&nbsp;&nbsp;<span class="gray"><span class="orange">&bull;</span> LOOP</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/faculty"><span class="gray">FACULTY</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/contact"><span class="gray">CONTACT</span></a>
      </li>
    </ul>
  </div>
</nav>
</div>