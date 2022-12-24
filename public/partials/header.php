<?php
defined("BASEPATH") or exit("No direct script access allowed");
?>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/assets/img/logo.png" width="35" height="35" alt="logos">
                SA<span>TECH</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'about' ? 'active' : '' ?>" href="/about">
                            <i class="fa fa-info-circle"></i> about
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'kamus' ? 'active' : '' ?>" href="/">
                            <i class="fa fa-search"></i> Translate
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>