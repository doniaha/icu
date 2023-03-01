<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
    }

    .box {
        position: absolute;
        top: 11%;
        right: -100%;
        background-color: white;
        padding: 20px 30px;
        border-radius: 10px;
        border-left: 6px solid #2196f3;
        overflow: hidden;
        transition: all 0.3s linear;
        color: black;
    }

    .box.active {
        right: 35px;
    }

    .box .info {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box .mes {
        display: flex;
        flex-direction: column;
        margin-left: 10px;
        line-height: 1.2;
        font-size: 18px;
        font-weight: 500;
    }

    .box .mes .text:first-child {
        font-weight: 600;
    }

    .box .check {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        background: #2196f3;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .box .close {
        position: absolute;
        top: 10px;
        right: 25px;
        opacity: 0.7;
        cursor: pointer;
        position: absolute;
        top: 12px;
        right: 15px;
        opacity: 0.7;
        cursor: pointer;
    }

    .box .bar {
        position: absolute;
        top: 94%;
        left: 0%;
        width: 100%;
        height: 6px;
        box-shadow: 0 0 10px #d1c7c7;
    }

    .box .bar::before {
        content: "";
        background-color: #2196f3;
        left: 100%;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .bar.active::before {
        animation: gross 2.5s linear;
    }

    @keyframes gross {
        to {
            left: 0%;
        }
    }
</style>

<div class="box" id="box">
    <div class="info">
        <div class="check">
            <i class="fa-solid fa-check"></i>
        </div>
        <div class="mes">
            <span class="text">Success</span>
            <span class="text">The product has been added</span>
        </div>
    </div>
    <i class="fa-solid fa-xmark close" id="close"></i>
    <div class="bar" id="bar"></div>
</div>
<script>
    let box = document.getElementById("box");
    let bar = document.getElementById("bar");
    let close = document.getElementById("close");

    function load() {
        box.classList.add("active");
        bar.classList.add("active");
        close.addEventListener("click", () => {
            box.classList.remove("active");
            bar.classList.remove("active");
        });
        setTimeout(() => {
            box.classList.remove("active");
            bar.classList.remove("active");
        }, 2500);
    }
    load()
</script>