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
        },
        roomId: Number
    },
    watch: {
        setting( newSetting ) {
            this.setting = newSetting;
        },
        isDrag( flg ) {
            if (flg) return;
            if (this.stash.location.length > 0) {
                this.pushStash();
            }
            this.stash = this.setEmpty();
        },
        roomId() {
            this.getHistory();
        },
        history() {
            this.drawHistory();
        }
    },
    data: function () {
        return {
            canvas: null,
            ctx:    null,
            isDrag: false,
            lastPosition: [],
            history: [],
            stash: this.setEmpty()
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
        // 消しゴム機能チェックで切り替え
        checkEraser(eraserFlg) {
            this.ctx.globalCompositeOperation = !eraserFlg ? 'source-over' : 'destination-out';
        },
        // canvasをクリアする
        clearCanvas() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        },
        // 描画開始
        drawStart( e ) {
            this.ctx.lineWidth   = this.setting.lineWidth;
            this.ctx.strokeStyle = this.setting.color;
            this.checkEraser(this.setting.eraser);

            const x = e.offsetX;
            const y = e.offsetY;

            this.ctx.beginPath();
            this.ctx.lineTo( x, y );
            this.ctx.stroke();
            this.isDrag = true;
            this.stash.location.push([x, y]);
        },
        // 描画中
        draw( e ) {
            const x = e.offsetX;
            const y = e.offsetY;
            if (!this.isDrag) return;

            this.stash.location.push([x, y]);
            this.ctx.lineTo( x, y );
            this.ctx.stroke();
        },
        // 描画終了
        drawEnd( e ) {
            this.ctx.closePath();
            this.isDrag = false;
        },
        // 直近のログを送信する
        pushStash() {
            this.stash.lineWidth = this.setting.lineWidth;
            this.stash.color     = this.setting.color;
            this.stash.eraser    = this.setting.eraser;
            this.stash.drew_at   = Date.now();
            // ajax送信
            axios.post('/canvas/room/' + this.roomId + '/history', { stash: this.stash }
            ).then(response => {
                this.getHistory();
            }).catch(error => {
                console.log(error);
            });
        },
        // ログから絵を描画する
        drawHistory() {
            this.clearCanvas();
            if (this.history.length == 0) return;
            this.history.forEach((temp, index) => {
                this.ctx.beginPath();
                this.ctx.lineWidth   = temp.lineWidth;
                this.ctx.strokeStyle = temp.color;
                this.checkEraser(temp.eraser);
                temp.location.forEach((location) => {
                    this.ctx.lineTo(location[0], location[1]);
                    this.ctx.stroke();
                });
                this.ctx.closePath();
            });
        },
        // サーバー上のログを取得する
        getHistory() {
            if (this.roomId === undefined) return;
            axios.get('/canvas/room/' + this.roomId + '/history')
            .then(response => {
                this.history = response.data;
            }).catch(error => {
                console.log(error);
            })
        }
    },
    mounted() {
        this.canvas = document.querySelector('#myCanvas');
        this.ctx    = this.canvas.getContext('2d');
        this.ctx.lineCap     = 'round';
        this.ctx.lineJoin    = 'round';
        this.ctx.lineWidth   = this.setting.lineWidth;
        this.ctx.strokeStyle = this.setting.color;
        this.getHistory();
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
