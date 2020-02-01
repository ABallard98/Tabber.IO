<!DOCTYPE html>
<html>
  <head>
    <title> HTML PLAYER </title>
    <style type="text/css">

      html, body {
        height:100%;
        background-color: #353C51;
      }

      ul, li, a, p{
        display:inline;
        color: white;
        text-decoration: none;
        padding: 6px 8px 6px 0px;
      }

      p {
        font-size: 20px;
        color: white;
        margin: 0px;
      }

      button{
        width:80%;
        text-align: center;
      
        font-size: 30px;
        background: white;
      }

      .sidenav{
        height: 100%; /* Full-height: remove this if you want "auto" height */
        width: 160px; /* Set the width of the sidebar */
        position: fixed; /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #111; /* Black */
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 20px;
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
      }

      .main {
        margin-left: 160px; /* Same as the width of the sidebar */
        padding: 0px 10px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }

      #songSelectionList{
        display: grid;
        float: left;
        padding-left: 0px;
        text-decoration: none;
      }

      .dropdown-toggle {
        color: white;
      }

      .clear {
        clear: both;
      }

      .content {
        overflow:hidden;
      }

     .barCursor {
         opacity: 0.15;
         background: #FFF200;
     }

     .beatCursor {
         opacity: 0.75;
         background: #0078ff;
     }

     .selectionWrapper div {
         opacity: 0.1;
         background: #4040FF;
     }

     .atHighlight * {
         fill: #0078ff;
     }

     .alphaTabSurface {
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
         background: #FFF;
         border-radius: 3px;
     }

     #settings-navbar {
       height: auto;
       width: 100%;
       clear: right;
       background-color: #353C51;
       color: white;
       overflow: hidden;
     }

     #layout-settings a:hover {
       background-color: white;
       color: black;
     }

     .active a{
       background-color: white;
       color: black;
     }

     .activeSpeed a{
       background-color: white;
       color: black;
     }

     .topnav {
       overflow: hidden;
     }

     #playbackSpeedSelector {
       float: left;
       margin: 0px;
       padding-left: 0px;
       overflow: hidden;
       color: white;
       list-style-type: none;
     }

     #playbackSpeedSelector a:hover{
       background-color:white;
       color: black;
     }

     #navbar {
       background-color: yellow;
       height: 150px;
       width: 100%;
     }

     #alphaTab {
         position: absolute;
         width: 50%;
         display: block;
         margin: auto;
     }

     .alphaTabContainer {
       width = 100%;
     }
    </style>
    <div id="scripts">
      <!-- including JQuery -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
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
  </head>
  <body>

    <div class="sidenav">
      <ul>
        <div id="songSelectionDiv">
          <p> Song Selection: </p>
          <ul id="songSelectionList"/>
            <li> <a href="#" data-value="sjAllIwant.gp5">All I want - Sungha Jung </a> </li>
            <li> <a href="#" data-value="everytime.gp5">Everytime - Sungha Jung </a> </li>
            <li> <a href="#" data-value="vivalavida.gp5">Viva la Vida - Coldplay </a> </li>
          </ul>
        </div>
      </ul>

      <p> Speed Settings: </p>
      <ul id="playbackSpeedSelector">
        <li><a href="#" data-value="0.25">25%</a></li>
        <li><a href="#" data-value="0.5">50%</a></li>
        <li><a href="#" data-value="0.6">60%</a></li>
        <li><a href="#" data-value="0.7">70%</a></li>
        <li><a href="#" data-value="0.8">80%</a></li>
        <li><a href="#" data-value="0.9">90%</a></li>
        <li class="activeSpeed"><a href="#" data-value="1">100%</a></li>
        <li><a href="#" data-value="1.1">110%</a></li>
        <li><a href="#" data-value="1.25">125%</a></li>
        <li><a href="#" data-value="1.5">150%</a></li>
        <li><a href="#" data-value="2">200%</a></li>
      </ul>

      <div id="layout-settings">
        <p> Page Layout Settings: </p>
        <br>
        <li class="active"><a href="#" id="page" data-layout="page" data-scrollmode="vertical">Page</a></li>
        <li><a href="#" id="horizontalBarwise" data-layout="horizontal" data-scrollmode="horizontal-bar">Horizontal (Barwise)</a></li>
        <li><a href="#" id="horizontalOffscreen" data-layout="horizontal" data-scrollmode="horizontal-offscreen">Horizontal (Offscreen)</a></li>
      </div>


      <div class="progress">
        <p> Loading: </p>
        <div class="progress-bar" id="soundFontProgress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
          0%
        </div>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="currentTrack">
            Tracks
        </a>
      </div> <!-- end of progress -->

    </div> <!-- end of settings navbar -->
  </div> <!-- end of header navbar -->

  <div class="main">
    <button id="playPause"> Play </button>
    <button id="stop"> Pause </button>

    <div id="alphaTab"></div>
  </div>

  <script>
      //
      //initialise alphatab
      var temppath = "{{ asset('files/sjAllIwant.gp5')}}";
      $('#alphaTab').alphaTab({
        file: temppath,
        player: "{{ asset('js/Alphatab/lib/alphatab/acoustic-guitar.sf2')}}",
        offset: [-10,-70],
        tracks: [0]
      })
      var at = $('#alphaTab');

      //
      // 1. setup events
      at.on('alphaTab.soundFontLoad', function(e, progress) {
          var percentage = ((progress.loaded / progress.total) * 100)|0;
          $('#soundFontProgress').css('width', percentage + '%').text(percentage + '%');
      });
      at.on('alphaTab.soundFontLoaded', function() {
          $('#soundFontProgressMenuItem').hide();
      });
      at.on('alphaTab.playerReady', function() {
          $('#loadingInfo').hide();
          $('#playPause').prop('disabled', false).removeAttr('disabled');
          $('#stop').prop('disabled', false).removeAttr('disabled');
          $('#looping').prop('disabled', false).removeAttr('disabled');
          $('#metronome').prop('disabled', false).removeAttr('disabled');
          updateControls();
      });
      at.on('alphaTab.playerStateChanged', function() {
          updateControls();
      });

      //
      // 2. Load alphaTab
      at.alphaTab();

      //
      // 3. Setup UI controls and use API to control the playback
      $('#print').click(function() {
          at.alphaTab('print');
      });
      $('#playPause').click(function() {
          at.alphaTab('playPause');
      });
      $('#stop').click(function() {
          at.alphaTab('stop');
      });
      $('#looping').click(function(e) {
          e.preventDefault();
          var looping = !at.alphaTab('loop');
          at.alphaTab('loop', looping);
          if(looping) {
              $('#looping').closest('li').addClass('active');
          }
          else {
              $('#looping').closest('li').removeClass('active');
          }
      });
      $('#metronome').click(function(e) {
          e.preventDefault();
          var metronomeVolume = at.alphaTab('metronomeVolume');
          if(metronomeVolume == 0) {
              at.alphaTab('metronomeVolume', 1);
              $('#metronome').closest('li').addClass('active');
          }
          else {
              at.alphaTab('metronomeVolume', 0);
              $('#metronome').closest('li').removeClass('active');
          }
      });

      //
      //music speed settings
      $('#playbackSpeedSelector a').click(function() {
          var playbackSpeed = $(this).data('value');
          //remove highglight on current speed choice
          $('a[data-value]').closest('li').removeClass('activeSpeed');
          //add highlight to current speed choice
          $(this).closest('li').addClass('activeSpeed');
          at.alphaTab('playbackSpeed', playbackSpeed);
          $('#playbackSpeed').text($(this).text());
      });

      //
      //song seleciton
      $('#songSelectionList a').click(function() {
        var song = $(this).data('value');
        var path = "\{\{asset(\'files/" + song + "\')\}\}'";
        alert("attempting to load: " + path);
        path = "files/" + song;
        $('#alphaTab').alphaTab('load',path);
      });

      function updateControls() {
          var playerState = at.alphaTab('playerState');
          switch(playerState) {
              case 0: // stopped/paused
              $('#playPause').removeClass('glyphicon-pause').addClass('glyphicon-play');
              break;
              case 1: // playing
              $('#playPause').removeClass('glyphicon-play').addClass('glyphicon-pause');
              break;
          }
      }

      //
      //page layout switcher
      $('a[data-layout]').click(function(e) {
          $('a[data-layout]').closest('li').removeClass('active');
          $(this).closest('li').addClass('active');

          //changing the float of alphatab div
          if($(this).data('layout') == "page"){
            $('#alphaTab').css("float", "none");//page format should have no float
          } else {
             $('#alphaTab').css("float", "left");
          }

          e.preventDefault();

          var layout = $(this).data('layout');
          var scrollmode = $(this).data('scrollmode');

          at.removeClass('horizontal page');
          at.addClass(layout);

          // update renderer
          at.alphaTab('layout', layout);

          // update player
          at.alphaTab('autoScroll', scrollmode);
          $('body,html').animate({
              scrollTop: 0
          }, 300);
      });

      //
      // 4. Track selector
      var tracks = [];
      // keep dropdown open
      $('#trackList').on('click', function(e) {
          e.stopPropagation();
      });

      //
      //on loaded
      at.on('alphaTab.loaded', function(e, score) {
          var trackList = $('#trackList');
          trackList.empty();

          for( var i = 0; i < score.Tracks.length; i++) {
              // build list item for track
              var li = $('<li></li>')
                  .data('track', score.Tracks[i].Index)
              ;

              // show/hide button and track title
              var title = $('<div class="title"></div>');
              li.append(title);

              var showHide = $('<i class="glyphicon glyphicon-eye-close showHide"></i>');
              title.append(showHide);
              title.append(score.Tracks[i].Name);
              title.on('click', function(e) {
                  var track = $(this).closest('li').data('track');
                  tracks = [track];
                  $(this).find('.showHide').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');

                  // render new tracks
                  at.alphaTab('tracks', tracks);
              });

              // solo and mute buttons
              var soloMute = $('<div class="btn-group btn-group-xs"></div>');
              var solo = $('<button type="button" class="btn btn-default solo">Solo</button>');
              solo.on('click', function(e) {
                  $(this).toggleClass('checked');
                  var isSolo = $(this).hasClass('checked');
                  var track = $(this).closest('li').data('track');
                  at.alphaTab('soloTrack', track, isSolo);
              });

              var mute = $('<button type="button" class="btn btn-default mute">Mute</button>');
              mute.on('click', function(e) {
                  $(this).toggleClass('checked');
                  var isMute = $(this).hasClass('checked');
                  var track = $(this).closest('li').data('track');
                  at.alphaTab('muteTrack', track, isMute);
              });
              soloMute.append(solo).append(mute);
              li.append(soloMute);


              trackList.append(li);
          }
      });

      //
      //on rendered
      at.on('alphaTab.rendered', function(e) {
          // load track indices
          tracks = at.alphaTab('tracks');
          for(var i = 0; i < tracks.length; i++) {
              tracks[i] = tracks[i].Index;
          }

          // check checkboxes
          $('#trackList li').each(function() {
              var track = $(this).data('track');
              var isSelected = tracks.indexOf(track) > -1;
              if(isSelected) {
                  $(this).find('.showHide').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
              }
              else {
                  $(this).find('.showHide').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
              }
          });
      });
     </script>
 </body>
</html>
