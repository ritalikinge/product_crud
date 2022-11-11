<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <h5>Modules</h5>
    </div>
    <ul class="nav">
        <li class="nav-item menu-items ">
            <a class="nav-link" href="{{ route('product.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Product</span>
            </a>
        </li>
        <li class="nav-item menu-items ">
            <a class="nav-link" href="{{ route('favourite.list') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Favourite Product</span>
            </a>
        </li>
    </ul>
</nav>
