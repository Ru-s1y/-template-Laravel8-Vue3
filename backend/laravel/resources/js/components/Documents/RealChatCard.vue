<script setup>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faComment } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faComment
);
</script>

<template>
    <div>
        <div class="flex items-center">
            <FontAwesomeIcon icon="comment" class="w-8 h-8 text-gray-400" />
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-600 abril-font">
                Real Time Chat
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 text-sm">
                WebSocket(Pusher)を利用したリアルタイムチャット機能です。<br>
                - チャットルームを選択し、交流を楽しんでください。<br>
                - 1部屋につき最大20人参加できます。<br>
                - 公序良俗に反する書き込みはおやめください。<br>
            </div>
        </div>
    </div>
</template>