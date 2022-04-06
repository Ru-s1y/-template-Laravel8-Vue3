<template>
    <div class="overflow-scroll canvas-container outer">
        <canvas
            id="myCanvas"
            class="canvas"
            width="800"
            height="600"
            @mousedown="drawStart"
            @mouseup="drawEnd"
            @mouseout="drawEnd"
            @mousemove="draw"
        ></canvas>
    </div>
</template>

<script>
export default {
    props: {
        setting: {
            color: String,
            lineWidth: Number,
            eraser: Boolean
        }
    },
    watch: {
        setting( newSetting ) {
            this.setting = newSetting;
        },
        isDrag( flg ) {
            if (flg) return;
            if (this.history.location.length > 0)
                this.pushHistory();
            this.history = this.setEmpty();
        }
    },
    data: function () {
        return {
            canvas: null,
            ctx:    null,
            isDrag: false,
            lastPosition: [],
            history: this.setEmpty()
        }
    },
    methods: {
        setEmpty() {
            return {
                lineWidth:  this.setting.lineWidth,
                color:      this.setting.color,
                eraser:     this.setting.eraser,
                location:   [],
                drew_at:    null
            };
        },
        drawStart( e ) {
            this.ctx.lineWidth   = this.setting.lineWidth;
            this.ctx.strokeStyle = this.setting.color;

            this.ctx.globalCompositeOperation = !this.setting.eraser ? 'source-over' : 'destination-out';

            const x = e.offsetX;
            const y = e.offsetY;

            this.ctx.beginPath();
            this.ctx.lineTo( x, y );
            this.ctx.stroke();
            this.isDrag = true;
            this.history.location.push([x, y]);
        },
        draw( e ) {
            const x = e.offsetX;
            const y = e.offsetY;
            if (!this.isDrag) return;

            this.history.location.push([x, y]);
            this.ctx.lineTo( x, y );
            this.ctx.stroke();
        },
        drawEnd( e ) {
            this.ctx.closePath();
            this.isDrag = false;
        },
        pushHistory() {
            this.history.lineWidth = this.setting.lineWidth;
            this.history.color     = this.setting.color;
            this.history.drew_at   = Date.now();
        }
    },
    mounted() {
        this.canvas = document.querySelector('#myCanvas');
        this.ctx    = this.canvas.getContext('2d');
        this.ctx.lineCap     = 'round';
        this.ctx.lineJoin    = 'round';
        this.ctx.lineWidth   = this.setting.lineWidth;
        this.ctx.strokeStyle = this.setting.color;
    }
}
</script>

<style scoped>
.canvas-container {
    background-color: gray;
    margin: 0;
    height: 80vh;
}
.outer {
    position: relative;
}
.canvas {
    background-color: #fff;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
}
</style>
