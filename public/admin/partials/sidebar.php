<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="/" class="logo">SATECH <span>Admin Page</span></a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="<?php echo $page == 'dashboard' ? 'active' : '' ?>">
                <a href="/admin/"><span class="fa fa-home mr-3"></span> Dashboard</a>
            </li>
            <li class="<?php echo $page == 'translate-2' ? 'active' : '' ?>">
                <a href="/admin/word.php/?type=is"><span class="fa fa-language mr-3"></span> Sunda Sedang</a>
            </li>
            <li class="<?php echo $page == 'translate-3' ? 'active' : '' ?>">
                <a href="/admin/word.php/?type=ish"><span class="fa fa-language mr-3"></span> Sunda Halus</a>
            </li>
            <li class="<?php echo $page == 'translate-4' ? 'active' : '' ?>">
                <a href="/admin/word.php/?type=isk"><span class="fa fa-language mr-3"></span> Sunda Kasar</a>
            </li>
            <li>
                <a href="/admin/logout.php" class="btn btn-danger mt-3"><i class="fa fa-sign-out mr-3"></i> Logout</a>
            </li>
        </ul>
        <!-- create logout -->

        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                with
                <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                    target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>