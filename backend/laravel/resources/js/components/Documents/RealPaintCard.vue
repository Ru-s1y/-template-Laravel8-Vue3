<script setup>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPaintbrush } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faPaintbrush
);
</script>

<template>
    <div>
        <div class="flex items-center">
            <FontAwesomeIcon icon="paintbrush" class="w-8 h-8 text-gray-400" />
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                Real Time Paint
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                WebSocket(Pusher)を利用したリアルタイムペイント機能です。<br>
                - キャンバスルームを選択し、ペイントを楽しんでください。<br>
                - 1部屋につき最大20人参加できます。<br>
                - キャンバスは1部屋につき1枚です。<br>
                - 公序良俗に反する書き込みはおやめください。<br>
            </div>
        </div>
    </div>
</template>