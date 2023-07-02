<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle mt-2" href="#" role="button" data-toggle="dropdown">
                    <span class="user-name">Selamat Datang, {{ Auth::User()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="\"><i class="dw dw-user1"></i>Halaman Utama</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"> Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
