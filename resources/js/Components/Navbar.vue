<template>
    <nav class="flex justify-between p-4 bg-gary-200">
        <div class="text-lg">
            <div>
                <ul class="flex gap-x-4 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="text-dark" :href="route('myhome')"> Home </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="text-dark" :href="route('aboutUs')"> About us </Link>
                    </li>
                    <li class="nav-item">
                        <Link class="text-dark" :href="route('contactUs')"> Contact Us </Link>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>