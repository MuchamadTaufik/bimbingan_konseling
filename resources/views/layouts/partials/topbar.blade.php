<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="identitas">
        <li class="identitas-item">
            <h6>{{ auth()->user()->name }}</h6>
        </li>
        <li class="identitas-item">
            <h6>{{ auth()->user()->semester ? auth()->user()->semester->name : 'Belum ada Semester' }}</h6>
        </li>
        <li class="identitas-item">
            <h6 id="clock"></h6>
        </li>
    </ul>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <form action="/logout" method="POST">
                @csrf
                <div class="icon-logout">
                    <button type="submit" class="btn btn-dark"><i class="bi bi-power" style="font-size: 1.4rem"></i></button>
                </div>
            </form>
        </li>
    </ul>

</nav>
<!-- End of Topbar -->