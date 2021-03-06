<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style media="screen">
      .list-group {
        overflow-y: scroll;
        height: 400px;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="row" id="app">
        <div class="offset-4 col-4 offset-sm-1 col-sm-10">
          <li class="list-group-item active">Chat Room
            <span class="badge badge-pill badge-warning">@{{ numberOfUsers }}</span>

          </li>
          <div class="badge badge-pill badge-primary" v-if="typing">
            @{{ typing }}
          </div>
          <ul class="list-group" v-chat-scroll>
            <message v-for="(message, key) in chat.messages"
            :user=chat.user[key]
            :key="key"
            :color=chat.color[key]
            :time=chat.time[key]
            >@{{ message }}</message>
          </ul>
          <input v-model="message" @keyup.enter="send" type="text" class="form-control" placeholder="type your messsage">
          <br>
          <span class="btn btn-info btn-sm" @click.prevent="deleteSession">Delete</span>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/app.js')}}">
    </script>

  </body>
</html>
