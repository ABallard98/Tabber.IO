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

    button{
      width: 100%;
      height: 50px;
    }

    button:not(hover){
      opacity: 80%;
    }

    button:hover{
      opacity: 100%;
    }

    ul, li, a, p{
      display:inline;
      color: white;
      text-decoration: none;
      padding: 6px 8px 6px 0px;
    }

    .active a{
      background-color: white;
      color: black;
    }

    .activeSpeed a{
      background-color: white;
      color: black;
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

    /* Style the header */
    .header {
      padding: 30px;
      text-align: center;
      font-size: 35px;
    }

    /* Create three unequal columns that floats next to each other */
    .column {
      float: left;
      padding: 10px;
      height: 100%; /* Should be removed. Only for demonstration */
    }

    /* left column */
    .column.left {
      width: 10%;
      height: 100%;
      position: fixed;
    }

    /* Middle column */
    .column.middle {
      width: 50%;
      height: 100%;
      padding-left: 5%;
      margin-left: 18%;
     }

    /* right column */
    .column.right {
      height: 100%;
      position: fixed;
      padding-left: 60%;
      margin-left: 20%;
    }


    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Style the footer */
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 10%;
      color: white;
      text-align: center;
    }

    #songSelectionList{
      display: grid;
      padding-left: 0px;
      text-decoration: none;
    }

    #playbackSpeedSelector {
      overflow: hidden;
      color: white;
      list-style-type: circle;
    }

    #playbackSpeedSelector a:hover{
      background-color:white;
      color: black;
    }

    #alphaTab {
      position: absolute;
      display: block;
      margin: auto;
      z-index: 1;
    }

    #container {
      height: 850px;
      overflow-y: auto;
    }

    #layout-settings a:hover {
      background-color: white;
      color: black;
    }

    /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
    @media (max-width: 600px) {
      .column.side, .column.middle {
        width: 100%;
      }
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
</head>

<body>

  <div class="header">
  </div>

  <div class="row">
    <div class="column left">
      <p> Speed Settings: </p>
      <br>
      <ul id="playbackSpeedSelector">
        <li><a href="#" data-value="0.25">25%</a></li><br>
        <li><a href="#" data-value="0.5">50%</a></li><br>
        <li><a href="#" data-value="0.6">60%</a></li><br>
        <li><a href="#" data-value="0.7">70%</a></li><br>
        <li><a href="#" data-value="0.8">80%</a></li><br>
        <li><a href="#" data-value="0.9">90%</a></li><br>
        <li class="activeSpeed"><a href="#" data-value="1">100%</a></li><br>
        <li><a href="#" data-value="1.1">110%</a></li><br>
        <li><a href="#" data-value="1.25">125%</a></li><br>
        <li><a href="#" data-value="1.5">150%</a></li><br>
        <li><a href="#" data-value="2">200%</a></li><br>
      </ul>

      <br>
      <p> Page Layout Settings: </p>
      <br>
      <div id="layout-settings">
        <br>
        <li class="active"><a href="#" id="page" data-layout="page" data-scrollmode="vertical">Page</a></li>
        <li><a href="#" id="horizontalBarwise" data-layout="horizontal" data-scrollmode="horizontal-bar">Horizontal (Barwise)</a></li>
        <li><a href="#" id="horizontalOffscreen" data-layout="horizontal" data-scrollmode="horizontal-offscreen">Horizontal (Offscreen)</a></li>
      </div>

      <lbr>

      <p> Loading: </p>
      <br>
      <div class="progress-bar" id="soundFontProgress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
          0%
      </div>
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="currentTrack">
            Tracks
      </a>
    </div>


    <div class="column middle" >
      <div id="container">
        <div id="alphaTab"></div>
      </div>
    </div>

    <div class="column right">
      <p id="songInfo"> </p>
      <button id="playPause"> Play / Pause </button>
      <button id="stop"> Stop </button>
    </div>
  </div>

  <div class="footer">

  </div>

<script>
  var songName = "http://tabber.test/files/" + "{{$fileName}}";
  //
  //initialise alphatab
  $('#alphaTab').alphaTab({
    file: songName,
    player: "{{ asset('js/Alphatab/lib/alphatab/acoustic-guitar.sf2')}}",
    offset: [-10,-70],
    tracks: [0],
    width: 800,
  });

  var at = $('#alphaTab');

  var score = alphaTab.importer.ScoreLoader.LoadScoreAsync($('#alphaTab').data('file'),
	function(score) {
		var info = jQuery('#songInfo');
		info.append('<p><b>Title:</b> '+score.Title+'</p>');
		info.append('<p><b>Subtitle:</b> '+score.Subtitle+'</p>');
		info.append('<p><b>Album:</b> '+score.Album+'</p>');
		info.append('<p><b>Tempo:</b> '+score.Tempo+'</p>');
		info.append('<p><b>Bars:</b> '+score.MasterBars.length+'</p>');
		info.append('<p><b>Tracks:</b> ('+score.Tracks.length+')</p>');
		var tracks = $('<ul></ul>');
		for(var i = 0; i < score.Tracks.length; i++) {
			tracks.append('<li>'+score.Tracks[i].Name+'</li>');
		}
		info.append(tracks);
	},
	function(error) {
		jQuery('#alphaTab').text('Error Loading the file: ' + error);
	});

  //var api = new alphaTab.platform.javaScript.AlphaTabApi(document.querySelector('#alphaTab'));
  //var container = api.container;

  //
  // 1. setup events
  //on initialise
  at.on('alphaTab.soundFontLoad', function(e, progress) {
    var percentage = ((progress.loaded / progress.total) * 100)|0;
    $('#soundFontProgress').css('width', percentage + '%').text(percentage + '%');
  });
  //on sound font loaded
  at.on('alphaTab.soundFontLoaded', function() {
      $('#soundFontProgressMenuItem').hide();
  });
  //on player ready
  at.on('alphaTab.playerReady', function() {
      $('#loadingInfo').hide();
      $('#playPause').prop('disabled', false).removeAttr('disabled');
      $('#stop').prop('disabled', false).removeAttr('disabled');
      $('#looping').prop('disabled', false).removeAttr('disabled');
      $('#metronome').prop('disabled', false).removeAttr('disabled');
      updateControls();
  });
  //on player state changed
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
        $('#container').css("height", "850px");
      } else {
        //else change the width/height css dimensions
         $('#alphaTab').css("float", "left");
         $('#container').css("height", "550px");
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
          var li = $('<li></li>').data('track', score.Tracks[i].Index);

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
