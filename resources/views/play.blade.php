<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{$fileName}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        height: 100%;
        background-color: #353C51;
      }

      #alphaTabPlayer {
        width: 100%;
        height: 900px;
      }

      .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
      }

      /* Style the links inside the navigation bar */
      .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }

      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }

      /* Style the "active" element to highlight the current page */
      .topnav a.active {
        background-color: #2196F3;
        color: white;
      }

      /* Style the search box inside the navigation bar */
      .topnav input[type=text] {
        padding: 6px;
        border: none;
        width: 800px;
        margin-top: 8px;
        margin-left: 28%;
        margin-right: 16px;
        margin-bottom: 8px;
        font-size: 17px;
      }

      .topnav input[type=text]::placeholder {
        opacity: 50%;
      }

      /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
      @media screen and (max-width: 600px) {
        .topnav a, .topnav input[type=text] {
          float: none;
          display: block;
          text-align: left;
          width: 100%;
          margin: 0;
          padding: 14px;
        }
        .topnav input[type=text] {
          border: 1px solid #ccc;
        }
      }

      .bottomnav {
        color: white;
        font-size: 16px;
      }

      .bottomnav p {
        margin-left: 10%;
      }

      table, th, td {
        border: 3px;
        width: 100%;
        vertical-align: top;
      }

      td p{
        color: white;
        margin-top: 0px;
        margin-right: 20px
      }

      #playerTable {
        width:90%;
      }

    </style>
    <div id="scripts">
      <!-- including JQuery -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous">
      </script>
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\jquery.alphaTab.js')}}">
      </script>
      <!-- including Alphatab -->
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\AlphaTab.js')}}">
      </script>
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\alphaTab.core.js')}}">
      </script>
      <!-- including alphaSynth -->
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\swfobject.js')}}">
      </script>
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\alphaSynth.js')}}">
      </script>
      <!-- including alphaSynth plugin -->
      <script
        src="{{ asset('js\Alphatab\lib\alphatab\jquery.alphaTab.alphaSynth.js')}}">
      </script>
    </div>
    <script type="text/javascript">
      var songName = "{{$fileName}}";
      localStorage.setItem("fileName", songName);
    </script>
  </head>
  <body>
    <table>
      <tr>
        <td id="playerTable">
          <div class="topnav">
              <input id="seachBar" type="text" placeholder="Search...">
          </div>
          <iframe id="alphaTabPlayer" src="{{asset('player\player.html')}}" ></iframe>
        </td>
        <td>
          <div class="sidenav">
            <p> Tags: </p>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
