<template>
    <canvas
        class="canvas"
        width="480"
        height="320"
        @mousedown="drawStart"
        @mouseup="drawEnd"
        @mouseout="drawEnd"
        @mousemove="draw"
    ></canvas>
</template>

<script>
export default {
    data: function () {
        return {
            canvas: null,
            ctx: null,
            isDrag: false,
            lastPosition: { x: null, y: null },
            lineWidth: 3,
            strokeStyle: '#000'
        }
    },
    methods: {
        drawStart( e ) {
            var x = e.offsetX;
            var y = e.offsetY;

            this.ctx.beginPath();
            this.ctx.lineTo( x, y );
            this.ctx.stroke();

            this.isDrag = true;
        },
        draw( e ) {
            var x = e.offsetX;
            var y = e.offsetY;

            if (!this.isDrag) return;

            this.ctx.lineTo( x, y );
            this.ctx.stroke();
        },
        drawEnd( e ) {
            this.ctx.closePath();
            this.isDrag = false;
        }
    },
    mounted() {
        this.ctx = this.$el.getContext('2d');
        this.ctx.lineCap     = 'round';
        this.ctx.lineJoin    = 'round';
        this.ctx.lineWidth   = this.lineWidth;
        this.ctx.strokeStyle = this.strokeStyle;
    }
}
</script>

<style scoped>
.canvas {
    border: 1px solid #000;
    background-color: #fff;
}
</style>
