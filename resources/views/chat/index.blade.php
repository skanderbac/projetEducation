@extends("layouts.front")
@section("title")
    Chat |
@endsection

@section('menu')
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>



    @endguest
@endsection

@section("contenu")
    <section id="about">
        <div id="container">
            <input type="hidden" id="valeur" value="0">
            <aside>
                <header>
                    <input type="text" placeholder="recherche">
                </header>
                <ul id="result">

                </ul>
            </aside>
            <main>
                <header>
                    <img src="" id="photo" style="width: 50px;height: 50px" alt="">

                        <h2 id="name"></h2>
                        <h3></h3>

                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
                </header>

                <ul id="chat">

                </ul>

                <footer>
                    <textarea placeholder="Ecrire votre message" id="message"></textarea>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
                    <a href="javascript:void(0)" id="envoyer">Envoyer</a>
                </footer>
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


        <script>
            $(function () {
                LoadMsg($('#valeur').val());
                LoadBox();
                $('#envoyer').click(function(){
                    sendMsg()
                });
                $("#message").keyup(function(event) {
                    if (event.keyCode === 13) {
                        sendMsg();
                    }
                });

            });


            function LoadMsg(chatbox_id) {
                var id= "{{ Auth::user()->id }}";
                $.ajax({
                    type: "GET",
                    url: "chat/getMessage/"+chatbox_id,
                    data: { chatbox_id: chatbox_id },
                    dataType: "json",
                    success: function (data) {
                        $('#chat').empty();
                        $.each(data, function (i, item) {
                            if (item.user_id.toString() === id) {
                                var rows = "<li class='me'>"+
                                    "<div class='entete'>"+
                                    "<span class='status green'></span>"+
                                    "<h3>"+item.created_at+"</h3>"+
                                    "</div>"+
                                    "<div class='triangle'></div>"+
                                    "<div class='message'>"+
                                    item.message+
                                    "</div>"+
                                    "</li>";
                            } else {
                                var rows = "<li class='you'>"+
                                    "<div class='entete'>"+
                                    "<span class='status green'></span>"+
                                    "<h3>"+item.created_at+"</h3>"+
                                    "</div>"+
                                    "<div class='triangle'></div>"+
                                    "<div class='message'>"+
                                    item.message+
                                    "</div>"+
                                    "</li>";
                            }
                            $("#chat").append(rows);
                        });
                    }
                });
            }

            function sendMsg() {
                var message = $("#message").val();
                var id= "{{ Auth::user()->id }}";
                $.ajax({
                    type: "POST",
                    url: "chat/sendMessage",
                    data: {
                        message: message,
                        user_id: id,//session
                        chatbox_id:$("#valeur").val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function (data) {
                        $("#message").val("");
                    },
                    complete: function () {
                        $('#chat').scrollTop($('#chat').scrollTop()+10000);
                    }
                });
            }
            function setChatBox(user1_id,user2_id,nom,path) {
                $("#name").html(nom);
                $('#photo').attr("src",path);
                $.ajax({
                    type: "POST",
                    url: "chat/getChatBox",
                    data: {
                        user1_id: user1_id,
                        user2_id: user2_id,
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $.each(data, function (i, item) {
                            $("#valeur").val(item.id);
                        });
                    }
                });
            }
            function LoadBox() {
                var id= "{{ Auth::user()->id }}";
                $.ajax({
                    type: "POST",
                    url: "chat/getBox",
                    data: { user_id: id },//session
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#result').empty();
                        console.log(data);
                        $.each(data, function (i, item) {
                            if (item.id.toString() !== id){
                                var path= "{{asset('photos')}}"+"/"+item.photo;
                                var rows = '<li><a href="javascript:void(0)" onclick="setChatBox('+item.user1_id+','+item.user2_id+',\''+item.name+'\',\''+path+'\');">'+
                                    '<img src="'+path+'" style="width: 50px;height: 50px">'+
                                    '<div>'+
                                    '<h2 style="color: green">'+item.name+'</h2>'+
                                    '<h3>'+
                                    '<span class="status green"></span>'+
                                    item.role+
                                    '</h3>'+
                                    '</div></a>'+
                                    '</li>';
                                $("#result").append(rows);
                            }
                        });

                    }
                });
            }

            setInterval(function () {
                LoadMsg($('#valeur').val());
                LoadBox();
            }, 500);

        </script>



        <style>
            *{
                box-sizing:border-box;
            }
            body{
                background-color:#abd9e9;
                font-family:Arial;
            }
            #container{
                width:750px;
                height:800px;
                background:#eff3f7;
                margin:0 auto;
                font-size:0;
                border-radius:5px;
                overflow:hidden;
            }
            aside{
                width:260px;
                height:800px;
                background-color:#3b3e49;
                display:inline-block;
                font-size:15px;
                vertical-align:top;
            }
            main{
                width:490px;
                height:800px;
                display:inline-block;
                font-size:15px;
                vertical-align:top;
            }

            aside header{
                padding:30px 20px;
            }
            aside input{
                width:100%;
                height:50px;
                line-height:50px;
                padding:0 50px 0 20px;
                background-color:#5e616a;
                border:none;
                border-radius:3px;
                color:#fff;
                background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
                background-repeat:no-repeat;
                background-position:170px;
                background-size:40px;
            }
            aside input::placeholder{
                color:#fff;
            }
            aside ul{
                padding-left:0;
                margin:0;
                list-style-type:none;
                overflow-y:scroll;
                height:690px;
            }
            aside li{
                padding:10px 0;
            }
            aside li:hover{
                background-color:#5e616a;
            }
            h2,h3{
                margin:0;
            }
            aside li img{
                border-radius:50%;
                margin-left:20px;
                margin-right:8px;
            }
            aside li div{
                display:inline-block;
                vertical-align:top;
                margin-top:12px;
            }
            aside li h2{
                font-size:14px;
                color:#fff;
                font-weight:normal;
                margin-bottom:5px;
            }
            aside li h3{
                font-size:12px;
                color:#7e818a;
                font-weight:normal;
            }

            .status{
                width:8px;
                height:8px;
                border-radius:50%;
                display:inline-block;
                margin-right:7px;
            }
            .green{
                background-color:#58b666;
            }
            .orange{
                background-color:#ff725d;
            }
            .blue{
                background-color:#6fbced;
                margin-right:0;
                margin-left:7px;
            }

            main header{
                height:110px;
                padding:30px 20px 30px 40px;
            }
            main header > *{
                display:inline-block;
                vertical-align:top;
            }
            main header img:first-child{
                border-radius:50%;
            }
            main header img:last-child{
                width:24px;
                margin-top:8px;
            }
            main header div{
                margin-left:10px;
                margin-right:145px;
            }
            main header h2{
                font-size:16px;
                margin-bottom:5px;
            }
            main header h3{
                font-size:14px;
                font-weight:normal;
                color:#7e818a;
            }

            #chat{
                padding-left:0;
                margin:0;
                list-style-type:none;
                overflow-y:scroll;
                height:535px;
                border-top:2px solid #fff;
                border-bottom:2px solid #fff;
            }
            #chat li{
                padding:10px 30px;
            }
            #chat h2,#chat h3{
                display:inline-block;
                font-size:13px;
                font-weight:normal;
            }
            #chat h3{
                color:#bbb;
            }
            #chat .entete{
                margin-bottom:5px;
            }
            #chat .message{
                padding:20px;
                color:#fff;
                line-height:25px;
                max-width:90%;
                display:inline-block;
                text-align:left;
                border-radius:5px;
            }
            #chat .me{
                text-align:right;
            }
            #chat .you .message{
                background-color:#58b666;
            }
            #chat .me .message{
                background-color:#6fbced;
            }
            #chat .triangle{
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 10px 10px 10px;
            }
            #chat .you .triangle{
                border-color: transparent transparent #58b666 transparent;
                margin-left:15px;
            }
            #chat .me .triangle{
                border-color: transparent transparent #6fbced transparent;
                margin-left:375px;
            }

            main footer{
                height:155px;
                padding:20px 30px 10px 20px;
            }
            main footer textarea{
                resize:none;
                border:none;
                display:block;
                width:100%;
                height:80px;
                border-radius:3px;
                padding:20px;
                font-size:13px;
                margin-bottom:13px;
            }
            main footer textarea::placeholder{
                color:#ddd;
            }
            main footer img{
                height:30px;
                cursor:pointer;
            }
            main footer a{
                text-decoration:none;
                text-transform:uppercase;
                font-weight:bold;
                color:#6fbced;
                vertical-align:top;
                margin-left:333px;
                margin-top:5px;
                display:inline-block;
            }
        </style>

    </section>


@endsection
