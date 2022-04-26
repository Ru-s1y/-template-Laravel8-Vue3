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
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                Documentation
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                ブログというかキュレーションサイトみたいなのを作る予定<br>
            </div>
        </div>
    </div>
</template>