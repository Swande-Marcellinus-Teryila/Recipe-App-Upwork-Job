<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{ url("/") }}">Admin</a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item active ">
                        <a href="{{ url("/") }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ url("/ingredients") }}" class='sidebar-link'>
                            <i class="bi bi-egg-fill"></i>
                            <span>Ingredients</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('/recipes') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Recipes</span>
                        </a>
                    </li>


                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>