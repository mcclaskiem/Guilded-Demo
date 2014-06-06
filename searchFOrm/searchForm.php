<?php
   
  //Test inputs from chooseChar.php

  if ($_POST['name']){
    $_SESSION['name'] = $_POST['name'];  
    $character = $_SESSION['name'];
  }
  if ($_POST['chosen-server']){
    $_SESSION['chosen-server'] = $_POST['chosen-server'];  
    $realm = $_SESSION['chosen-server'];
  }
  if ($_POST['chosen-region']){
    $_SESSION['chosen-region'] = $_POST['chosen-region'];  
    $region = $_SESSION['chosen-region'];
  }
  if ($_POST['role']){
    $_SESSION['role'] = $_POST['role'];   
    $role = $_SESSION['role'];
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Guilded</title>

  <!-- Global CSS Files -->
  <link rel="stylesheet" href="../docsupport/style.css">
  <link rel="stylesheet" href="../docsupport/prism.css">
  <link rel="stylesheet" href="../docsupport/nav-bar.css">

  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="chosen.css">

  <!-- JQuery and Chosen Javascript Files for Sliders and Dropdowns -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../js_bin/chosen.jquery.js" type="text/javascript"></script>
  <script src="../docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

            
  <!-- Beginning of Form -->
  <form id="searchForm" action="../searchResult/searchResult.php" method="post">
    <div id="w">



            <!-- NAV BAR -->
            <div id='cssmenu'>
              <ul>
                 <li class='active'><a href='../index.php'><span>Find Guild</span></a></li>
                 <li><a href='../index.php'><span>Recruiting Post</span></a></li>
                 <li><a href='../index.php'><span>Guilds</span></a></li>
                 <li class='../index.php'><a href='#'><span>Profile</span></a></li>
              </ul>
           </div>


           <!-- Start of Form Content -->
      <div id="content">
        <header>
          <h2 class="anchor">Search Guild Listings</h2>
        </header>

        <!-- Character Data is rendered here from Blizzard API -->
        <div id="charData"> 
          <center>
          <?php 
                include('charData.php');

            // test character name / server request with WoW API
            $url = 'http://us.battle.net/api/wow/character/' . $realm . '/' . $character;
            $url_head = @get_headers($url);
            if ($url_head[0] == 'HTTP/1.1 404 Not Found'){
              
              // invalid character / server
              echo "<p id='results'>$character</p>
                    <p id='results'>$realm</p>";

            } else {

              // array of character name, title, guild, and server
              $charData = charData($realm, $character);
               echo '<p id="results">' . $charData[0] . '</p>';
               echo '<p id="results">' . $charData[1] . '</p>';
               echo '<p id="results">' . $charData[2] . '</p>';
               echo '<p id="results">' . $charData[3] . '</p>';
            

              // character 3d profile
              include('core.php');
              $wowArmory = new WowArmory();
              $renderData = $wowArmory->getRenderData($realm , $character);
  }
          ?>

          
          <!-- Display of 3D Profile -->
          <object width="50%" height="300px" type="application/x-shockwave-flash"
                data="http://wow.zamimg.com/modelviewer/ZAMviewerfp11.swf" width="100%" height="100%"
                id="paperdoll-model-paperdoll-0-equipment-set">
            <param name="quality" value="high">
            <param name="wmode" value="direct"/>
            <param name="allowsscriptaccess" value="always">
            <param name="menu" value="false">
            <param name="flashvars"
                   value="model=<?= $renderData['racegender']; ?>&amp;modelType=16&amp;contentPath=http://wow.zamimg.com/modelviewer/&amp;equipList=<?= $renderData['appearance']; ?>"/>
          </object> 
          </center>

          <!-- Faction Selector -->
        <h2 class="anchor">FACTION</h2>
          <div id="faction">
            <label id="faction-img">
              <input type="radio" id="horde" name="faction" value="horde">
              <img src="../assets/horde-logo.gif">
            </label>
            <label id="faction-img">
              <input type="radio" id="alliance" name="faction" value="alliance">
              <img src="../assets/alliance-logo.png">
            </label>
          </div>
        </div>
  </body>
  <body> 
      <link href="../js_bin/jquery-ui-1.10.4.custom.css" rel="stylesheet">
      <script src="../js_bin/jquery-1.10.2.js"></script>
      <script src="../js_bin/jquery-ui-1.10.4.custom.js"></script>
      
      <!-- Progression Score Slider -->
      <script>
            $(function() {
              $( "#progression" ).slider({
                value:14,
                min: 0,
                max: 28,
                step: 1,
                slide: function( event, ui ) {
                  $( "#p-score" ).val( ui.value );
                }
              });
              $( "#p-score" ).val( $( "#progression" ).slider( "value" ) );
            });
            </script>
          </head>
          <body>
          <h2 class="anchor">MIN PROGRESSION SCORE</h2>
            <p>
              <label for="p-score" id="p-score2">Progression Score:</label>
              <input type="text" id="p-score" name="p-score" readonly="readonly">
            </p>

          <div id="progression"></div>


      <!-- Minimum iLvl Slider -->
      <script>
            $(function() {
              $( "#min-ilvl" ).slider({
                value:538,
                min: 496,
                max: 580,
                step: 1,
                slide: function( event, ui ) {
                  $( "#ilvl" ).val( ui.value );
                }
              });
              $( "#ilvl" ).val( $( "#min-ilvl" ).slider( "value" ) );
            });
            </script>
          </head>
          <body>
          <h2 class="anchor">MAX ITEM LVL</h2>
            <p>
              <label for="ilvl" id="ilvl2">ilvl:</label>
              <input type="text" id="ilvl" name="ilvl" readonly="readonly">
            </p>

          <div id="min-ilvl"></div>

        <script>
            $(function() {
              $( "#radio" ).buttonset();
            });
        </script>


            <script>
                  $(function() {
                    $( "#check" ).button();
                    $( "#format" ).buttonset();
                  });
            </script>


            <!-- Classes Checkboxes -->
            <h2 class="anchor">CLASSES</h2>
            <div id="classes">
                <input type="checkbox" id="warrior" name="classes[]" value="warrior">
                <input type="checkbox" id="shaman" name="classes[]" value="shaman">
                <input type="checkbox" id="druid" name="classes[]" value="druid">
                <input type="checkbox" id="rogue" name="classes[]" value="rogue">
                <input type="checkbox" id="hunter" name="classes[]" value="hunter">
                <input type="checkbox" id="paladin" name="classes[]" value="paladin">
                <input type="checkbox" id="mage" name="classes[]" value="mage">
                <input type="checkbox" id="warlock" name="classes[]" value="warlock">
                <input type="checkbox" id="priest" name="classes[]" value="priest">
                <input type="checkbox" id="monk" name="classes[]" value="monk">
                <input type="checkbox" id="deathknight" name="classes[]" value="deathknight">
            </div>


            <script>
                  $(function() {
                    $( "#check" ).button();
                    $( "#format" ).buttonset();
                  });
            </script>

            
              <!--       Session inputs for AJAX      -->
        <?php 
        echo "
            <input type=\"hidden\" name =\"character\" value=\"$character\">
            <input type=\"hidden\" name =\"chosen-server\" value=\"$realm\">
            <input type=\"hidden\" name =\"chosen-region\" value=\"$region\">
            <input type=\"hidden\" name =\"role\" value=\"$role\"> ";
        ?>

        <!--       SUBMIT BUTTON -->
      <button id="sub" class="button button-blue">Search</a>

        <!-- Javascript for Chosen Dropdown -->
  <script src="../js_bin/chosen.jquery.js" type="text/javascript"></script>

  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  </form>

</body>

</html>