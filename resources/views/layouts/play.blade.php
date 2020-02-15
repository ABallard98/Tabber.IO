<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{$filename}}</title>
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

      #searchBar {
        background-image: url('/css/searchicon.png'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
      }

      #searchResults {
      border-collapse: collapse; /* Collapse borders */
      width: 100%; /* Full-width */
      border: 1px solid #ddd; /* Add a grey border */
      font-size: 18px; /* Increase font-size */
    }

    #searchResults th, #searchResults td {
      text-align: left; /* Left-align text */
      padding: 12px; /* Add padding */
    }

    #searchResults tr {
      /* Add a bottom border to all table rows */
      border-bottom: 1px solid #ddd;
      display: none;
    }

    #searchResults tr.header, #searchResults tr:hover {
      /* Add a grey background color to the table header and on hover */
      background-color: #f1f1f1;
    }

    </style>
    <div id="scripts">
      <!-- search bar script -->
      <script>
        // Declare variables
        function updateSearch(){
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchBar");
          filter = input.value.toUpperCase();
          table = document.getElementById("searchResults");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          if(filter != ""){
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "block";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          } else {
            for (i = 0; i < tr.length; i++) {
              tr[i].style.display = "none";
            }
          }
        }
        </script>

      <script src="{{asset('js\searchBar.js')}}"> </script>
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
      var songName = "{{$filename}}";
      localStorage.setItem("fileName", songName);
    </script>
  </head>
  <body>

    <table>
      <tr>
        <td id="playerTable">
          <div class="topnav">
              <input id="searchBar" onkeyup="updateSearch()" type="text" placeholder="Search...">
              @yield('songTable');
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
