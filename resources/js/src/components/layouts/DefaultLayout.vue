<script setup></script>
<template>
    <div class="container">
        <header class="bg-info text-white mb-4">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand text-light" href="#"> Assignment</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <router-link
                                    to="/login"
                                    class="nav-link text-light"
                                    href="#"
                                    >Login</router-link
                                >
                            </li>
                            <li class="nav-item">
                                <router-link
                                    to="/register"
                                    class="nav-link text-light"
                                    href="#"
                                    >Register</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
