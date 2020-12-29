<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");
        * {
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 10px;
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(to right, #12c2e9, #c471ed, #f64f59); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        input[type=radio] {
            display: none;
        }
        .card {
            position: absolute;
            /*width: 60%;*/
            /*height: 100%;*/
            left: 0;
            right: 0;
            margin: auto;
            transition: transform 0.4s ease;
            cursor: pointer;
        }
        .container {
            width: 100%;
            max-width: 800px;
            max-height: 600px;
            height: 100%;
            transform-style: preserve-3d;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .cards {
            position: relative;
            width: 100%;
            height: 100%;
            margin-bottom: 20px;
        }
        img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            object-fit: cover;
        }
        /*#item-1:checked ~ .cards #song-4,
        #item-2:checked ~ .cards #song-1,
        #item-3:checked ~ .cards #song-2,
        #item-4:checked ~ .cards #song-3 {
            transform: translatex(-40%) scale(0.8);
            opacity: 0.4;
            z-index: 0;
        }
        #item-1:checked ~ .cards #song-2,
        #item-2:checked ~ .cards #song-3,
        #item-3:checked ~ .cards #song-4,
        #item-4:checked ~ .cards #song-1 {
            transform: translatex(40%) scale(0.8);
            opacity: 0.4;
            z-index: 0;
        }
        #item-1:checked ~ .cards #song-1,
        #item-2:checked ~ .cards #song-2,
        #item-3:checked ~ .cards #song-3,
        #item-4:checked ~ .cards #song-4 {
            transform: translatex(0) scale(1);
            opacity: 1;
            z-index: 1;
        }
        #item-1:checked ~ .cards #song-1 img, #item-2:checked ~ .cards #song-2 img, #item-3:checked ~ .cards #song-3 img, #item-4:checked ~ .cards #song-4 img {
            box-shadow: 0px 0px 5px 0px rgba(81, 81, 81, 0.47);
        }*/

        .player {
            background-color: #fff;
            border-radius: 8px;
            min-width: 457px;
            padding: 16px 10px;
        }
        .upper-part {
            position: relative;
            display: flex;
            align-items: center;
            /*margin-bottom: 12px;*/
            height: 36px;
            overflow: hidden;
        }
        .play-icon {
            margin-right: 10px;
        }
        .song-info {
            width: calc(100% - 32px);
            display: block;
        }
        .song-info .title {
            color: #403d40;
            font-size: 14px;
            line-height: 24px;
        }
        .sub-line {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .subtitle, .time {
            font-size: 12px;
            line-height: 16px;
            color: #c6c5c6;
        }
        .time {
            font-size: 12px;
            line-height: 16px;
            color: #a5a5a5;
            font-weight: 500;
            margin-left: auto;
        }
        .progress-bar {
            height: 3px;
            width: 100%;
            background-color: #e9efff;
            border-radius: 2px;
            overflow: hidden;
        }
        .progress {
            display: block;
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #2992dc;
            border-radius: 6px;
        }
        .info-area {
            width: 100%;
            position: absolute;
            top: 0;
            left: 30px;
            transition: transform 0.4s ease-in;
        }
        .song {
            opacity: 0;
        }
        /*#item-1:checked ~ .player #test {
            transform: translateY(0);
        }
        #item-2:checked ~ .player #test {
            transform: translateY(-40px);
        }
        #item-3:checked ~ .player #test {
            transform: translateY(-80px);
        }
        #item-4:checked ~ .player #test {
            transform: translateY(-120px);
        }*/
        #overlay {
            position: fixed; /* Sit on top of the page content */
            display:  none; /* Hidden by default */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
             /* Add a pointer on hover */
        }
        #text{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 900px;
            height: 500px;
            font-size: 50px;
            color: white;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
        }


    </style>
</head>
<body>

<div id="overlay" onclick="off()">
    <div id="text">
                <video id="example-player" controls style="width: 900px; height: 500px;">        >
                    <source src="{{$videos[1]->cdn_url}}#t=0.1"
                            title="1080p" type="video/mp4"/>

                </video>
    </div>
</div>

<div class="container">
    <div class="block" style="margin-bottom: 20px">#Playlist for Top Ranks</div>
    @for($i=1; $i<=$count; $i++)
        <input type="radio" name="slider" id="item-{{$i}}" data-song="{{$i}}" {{($i==1?"checked":"")}}>
    @endfor
    <div class="cards">
        @for($i=1; $i<=$count; $i++)
            <label class="card song" for="item-{{$i}}" id="song-{{$i}}">
                <img src="../img/screens/{{$videos[$i]->id_format}}/{{$videos[$i]->id_format}}_screen.jpg" alt="song">
            </label>
        @endfor
{{--        <label class="card" for="item-1" id="song-1">--}}
{{--            <img src="https://images.unsplash.com/photo-1530651788726-1dbf58eeef1f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=882&q=80" alt="song">--}}
{{--        </label>--}}
{{--        <label class="card" for="item-2" id="song-2">--}}
{{--            <img src="https://images.unsplash.com/photo-1559386484-97dfc0e15539?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80" alt="song">--}}
{{--        </label>--}}

    </div>
    <div class="player">
        <div class="upper-part">
            <div class="play-icon">
                <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
                    <defs/>
                    <path d="M5 3l14 9-14 9V3z"/>
                </svg>
            </div>
            <div class="info-area" id="test">
                @for($i=1; $i<=$count; $i++)
                    <label class="song-info" id="song-info-{{$i}}">
                        <div class="title">{{$videos[$i]->title}}</div>
                        <div class="sub-line">
                            <div class="subtitle">Hatsune Miku</div>
                            <div class="time">{{$videos[$i]->duration}}</div>
                        </div>
                    </label>
                    @endfor
            </div>
        </div>
{{--        <div class="progress-bar">--}}
{{--            <span class="progress"></span>--}}
{{--        </div>--}}
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script>

<script>


    $('input').on('change', function() {
        $('body').toggleClass('blue');
    });
    $("#song-1").css({
        boxShadow: "0px 0px 5px 0px rgba(81, 81, 81, 0.47)",
        transform: "translateX(0) scale(1)",
        opacity: 1,
        zIndex: 1
    });
    $("#song-" + $(".song").length).css({
        transform: "translateX(-40%) scale(0.8)",
        opacity: 0.4,
        zIndex: 0
    });
    $("#song-2").css({
        transform: "translateX(40%) scale(0.8)",
        opacity: 0.4,
        zIndex: 0
    });
    $('[name=slider]').on('change', function() {

        var ele = document.getElementsByClassName("card song");
        for (let i = 0; i < ele.length; i++){
            console.log(ele[i].style.opacity);
        }

        var self = $(this);
        var label = $("#song-" + self.data("song"));
        $(".song").removeAttr("style");
        $("#test").css({
            transform: "translateY(" + -((self.data("song") - 1) * 40) + "px)"
        });
        label.css({
            boxShadow: "0px 0px 5px 0px rgba(81, 81, 81, 0.47)",
            transform: "translateX(0) scale(1)",
            opacity: 1,
            zIndex: 1
        });
        if (self.data("song") == "1" && self.data("song") != $(".song").length) {
            $("#song-" + $(".song").length).css({
                transform: "translateX(-40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
            label.next().css({
                transform: "translateX(40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
        } else if (self.data("song") == $(".song").length && self.data("song") != "1") {
            label.prev().css({
                transform: "translateX(-40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
            $("#song-1").css({
                transform: "translateX(40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
        } else {
            label.prev().css({
                transform: "translateX(-40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
            label.next().css({
                transform: "translateX(40%) scale(0.8)",
                opacity: 0.4,
                zIndex: 0
            });
        }
    });
    var ele = document.getElementsByClassName("card song");
    for (let i = 0; i < ele.length; i++){
        if (ele[i].style.opacity == 1){
            console.log(ele[i]);
            ele[i].addEventListener("click", function () {
                document.getElementById("overlay").style.display = "block";
                document.getElementById("text").style.display = "block";
            })
        }
    }
    function off() {
        document.getElementById("overlay").style.display = "none";
    }

</script>
<script>

</script>
<script>
    fluidPlayer(
        'example-player',
        {
            layoutControls: {
                primaryColor: "#28B8ED",

            }
        }
    );
</script>
</body>
</html>
