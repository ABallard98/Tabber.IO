<!DOCTYPE html>
<html>
  <head>
    <title> Tabber.io - Home </title>
    <style>
      * {
        box-sizing: border-box;
      }

      h1,h2,h3,p a, p{
        color: white;
      }

      ul, li {
        list-style-position: inside;
        color: white;
        padding-bottom: 5px;
        float: center;
        text-align: center;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #353C51;
        margin: 0;
        padding: 0;
        text-align: center;
      }

      .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
        width: 98%;
        height: 40px;
      }

      /* Style the links inside the navigation bar */
      .topnav a {
        display: block;
        color: black;
        text-align: center;
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
        height: 100%;
        vertical-align: top;
      }

      td p{
        color: white;
        margin-top: 0px;
        margin-right: 20px
      }

      #searchBar {
        background-image: url('/css/searchicon.png'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 90%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
        margin-left: 10px;
        margin-top: 2px;
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
        width: 100%;
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

      #infoTable{
        margin-left:auto;
        margin-right:auto;
        width: 80%;
      }

    </style>
  </head>
  <body>
    <div id="searchScript">
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
      }//end of if
      </script>

    <h1><u>Welcome to Tabber.io</u></h1>

    <p>
      <a href="/"> Home, </a>
      <a href="/artists"> Artists, </a>
      <a href="/songs"> Songs </a>
    </p>

    <table>
      <tr>
        <td id="playerTable">
          <div class="topnav">
              <!--<img src="images/search-icon.png" style="width:30px;height:30px;" />-->
              <input id="searchBar" onkeyup="updateSearch()" type="text" placeholder="Search...">
              @yield('songTable');
          </div>
        </td>
      </tr>
    </table>

    <table id="infoTable">
      <tr>
        <td>
          <h2><u> What is Tabber.io: </u> </h2>
          <p>
            Tabber.io is a music tablature interactive player and database for
            guitar-pro files (.gp5, .gpx, .gp4). This service allows users to upload/download
            and play their favourite songs on any instrument following the interactive player.
            Although the player uses guitar-pro files, you can play along with any
            instrument by following the traditional sheet music.
          </p> <p>
            This project is a work in progress so some features may not be implemented yet,
            for updates on the project, you can check the github repository for the site below.
          </p>
        </td>
      </tr>

      <tr>
        <td>
          <h2><u> How to read tablature: </u></h2>
          <iframe width="420" height="315" src="https://www.youtube.com/embed/j2lJjaDDD0k"
            frameborder="0"
            allow="accelerometer;
            autoplay;
             encrypted-media;
             gyroscope;
             picture-in-picture"
             allowfullscreen>
          </iframe>
        </td>
      </tr>

      <tr>
        <td>
          <h2><u> Upcoming features: </u> </h2>
          <ul>
            <li> Uploading/Downloading of files </li>
            <li> Player instrument options </li>
            <li> Song tags and user comments </li>
            <li> More player options </li>
          </ul>
        </td>
      </tr>

      <tr>
        <td>
          <h2><u> Info: </ul></h2>
          <p> Github:
            <a href="https://github.com/ABallard98/Tabber.IO/">
               https://github.com/ABallard98/Tabber.IO/ </a>
          </p>
          <p> Email: Aydenballard@gmail.com </p>
        </td>
      </tr>
    </table>
  </body>
</html>
