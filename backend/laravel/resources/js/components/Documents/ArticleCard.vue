<script setup>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faNewspaper } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faNewspaper
);
</script>

<template>
    <div>
        <div class="flex items-center">
            <FontAwesomeIcon icon="newspaper" class="w-8 h-8 text-gray-400" />
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-600 abril-font">
                Articles
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 text-sm">
                基本的なCRUD機能を備えた記事投稿機能です。<br>
            </div>
        </div>
    </div>
</template>