<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Karyawan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#1e1e2f;
    color:white;
    overflow-x:hidden;
}

.wrapper{
    display:flex;
}

.sidebar{
    width:270px;
    height:100vh;
    background:#141421;
    position:fixed;
    top:0;
    left:0;
    padding:20px;
    display:flex;
    flex-direction:column;
    transition:.3s;

    overflow-y:auto;
    overflow-x:hidden;
}

.sidebar::-webkit-scrollbar{
    width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#7c4dff;
    border-radius:10px;
}

.sidebar.hide{
    width:90px;
}

.logo{
    text-align:center;
    margin-bottom:30px;
}

.logo i{
    font-size:45px;
    color:#7c4dff;
}

.logo h4{
    margin-top:10px;
}

.menu{
    flex:1;
}

.menu a{
    display:flex;
    align-items:center;
    color:#ddd;
    text-decoration:none;
    padding:15px;
    border-radius:15px;
    margin-bottom:10px;
    transition:.3s;
}

.menu a:hover,
.menu .active{
    background:#7c4dff;
    color:white;
}

.content{
    width:100%;
    margin-left:270px;
    padding:25px;
    transition:.3s;
}

.content.full{
    margin-left:90px;
}

.topbar{
    background:#2a2a40;
    padding:15px 25px;
    border-radius:20px;
    margin-bottom:30px;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.toggle-btn{
    width:45px;
    height:45px;
    border:none;
    border-radius:15px;
    background:#7c4dff;
    color:white;
}

#jam{
    color:#b388ff;
    font-weight:bold;
}

.user-card{
    background:#2a2a40;
    border-radius:20px;
    padding:15px;
    text-align:center;
}

.user-card i{
    font-size:40px;
    color:#b388ff;
    margin-bottom:10px;
}

.logout-btn{
    width:35px;
    height:35px;
    border:none;
    border-radius:10px;
    background:#dc3545;
    color:white;
    margin-top:15px;
}

.sidebar.hide .logo h4,
.sidebar.hide .menu span,
.sidebar.hide .user-card{
    display:none;
}

</style>
</head>
<body>

<div class="wrapper">

<div class="sidebar" id="sidebar">

    <div class="logo">
        <i class="fas fa-users"></i>
        <h4>Manajemen Karyawan</h4>
    </div>

    <div class="menu">

        <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
           href="{{ route('dashboard') }}">
            <i class="fas fa-home me-3"></i>
            <span>Dashboard</span>
        </a>

        <a class="{{ request()->routeIs('karyawan.*') ? 'active' : '' }}"
           href="{{ route('karyawan.index') }}">
            <i class="fas fa-users me-3"></i>
            <span>Data Karyawan</span>
        </a>

        <a class="{{ request()->routeIs('absensi.*') ? 'active' : '' }}"
           href="{{ route('absensi.index') }}">
            <i class="fas fa-calendar-check me-3"></i>
            <span>Absensi</span>
        </a>

        <a class="{{ request()->routeIs('cuti.*') ? 'active' : '' }}"
           href="{{ route('cuti.index') }}">
            <i class="fas fa-file-signature me-3"></i>
            <span>Pengajuan Cuti</span>
        </a>

        <a class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}"
           href="{{ route('pengumuman.index') }}">
            <i class="fas fa-bullhorn me-3"></i>
            <span>Pengumuman</span>
        </a>

    </div>

    <div class="user-card">

        <i class="fas fa-user-circle"></i>

        <h5>{{ auth()->user()->name }}</h5>

        <span class="badge bg-warning text-dark">
            {{ ucfirst(auth()->user()->role) }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
            </button>

        </form>

    </div>

</div>

<div class="content" id="content">

    <div class="topbar">

        <button class="toggle-btn" id="toggleBtn">
            <i class="fas fa-bars"></i>
        </button>

        <h5 id="jam"></h5>

        <div>
            <i class="fas fa-user-circle me-2"></i>
            {{ auth()->user()->name }}
        </div>

    </div>

    @yield('content')

</div>

</div>

<script>

const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

document.getElementById('toggleBtn').onclick = function(){

    sidebar.classList.toggle('hide');
    content.classList.toggle('full');

}

function updateClock(){

    document.getElementById('jam').innerHTML =
    new Date().toLocaleTimeString('id-ID');

}

setInterval(updateClock,1000);

updateClock();

</script>

</body>
</html>