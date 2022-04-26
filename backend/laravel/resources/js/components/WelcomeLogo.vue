<template>
<div class="flex justify-center">
    <div class="welcome-logo">
        <img src="/images/HornwormFairy.png" class="rounded-xl">
    </div>
</div>
</template>

<script>
import gsap from 'gsap';
export default {
    methods: {
        loadImage() {
            gsap.fromTo(".welcome-logo",
            {
                opacity: 0.3
            },
            {
                opacity: 1,
                duration: 2,
                yoyo: true,
                repeat: -1
            })
        }
    },
    mounted() {
        this.loadImage()
    }
}
</script>