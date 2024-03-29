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
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Measurements</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ url("/measurements") }}">Measurements</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ url("measurement-pairing") }}">Measurement Pairing</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Recipe</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ url("/") }}">Add Recipes</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ url("/recipes") }}">My Recipes</a>
                            </li>
                        </ul>
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