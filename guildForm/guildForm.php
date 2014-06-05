<?php
   
  //Test inputs from chooseChar.php

  if ($_POST['name']){
    $_SESSION['name'] = $_POST['name'];  
    $guild = $_SESSION['name'];
  }
  if ($_POST['chosen-server']){
    $_SESSION['chosen-server'] = $_POST['chosen-server'];  
    $realm = $_SESSION['chosen-server'];
  }
  if ($_POST['chosen-region']){
    $_SESSION['chosen-region'] = $_POST['chosen-region'];
    $region = $_SESSION['chosen-region'];
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
  <form id="guildForm" action="submit.php" method="post">
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
      <div id="content">
        <header>
          <h2 class="anchor">Create Recruitment Form</h2>
        </header>
          <center id="results-pad">
          <?php 
                include('guildData.php');

            // test character name / server request with WoW API
            $url = 'http://us.battle.net/api/wow/guild/' . $realm . '/' . $guild;
            $url_head = @get_headers($url);
            if ($url_head[0] == 'HTTP/1.1 404 Not Found'){
              
              // invalid character / server
              echo "<p id='results'>$guild</p>
                    <p id='results'>$realm</p>";

            } else {

              // array of guild name, level, achievement points and server
               $guildData = guildData($guild, $realm);
               echo "<p id='results'>$guildData[0]</p>
                    <p id='results'>Level: $guildData[1]</p>
                    <p id='results'>Achievement Points: $guildData[2]</p>
                    <p id='results'>$guildData[3]</p>";

  }
          ?>
          </center>  
        <h2 class="anchor">FACTION</h2>

        <!-- Faction Selector -->
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

      <!-- Custom Jquery Files -->
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


          <!-- Element Containing the Progression Score Slider -->
          <h2 class="anchor">PROGRESSION SCORE</h2>
            <p>
              <label for="p-score" id="p-score2">Progression Score:</label>
              <input type="text" id="p-score" name="p-score" readonly="readonly">
            </p>


          <!-- Slider -->
          <div id="progression"></div>


          <!-- Script for Minimum iLvl Slider -->
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

          <!-- Element Containing Minimum iLvl slider -->
          <h2 class="anchor">MIN ILVL</h2>
            <p>
              <label for="ilvl" id="ilvl2">Min. ilvl:</label>
              <input type="text" id="ilvl" name="ilvl" readonly="readonly">
            </p>


            <!-- Slider -->
          <div id="min-ilvl"></div>
        
          <!-- Radio Button -->
        <script>
            $(function() {
              $( "#radio" ).buttonset();
            });
        </script>

        <!-- Elements Containing Radio Button -->
        <h2 class="anchor">ROLE</h2>
          <div id="role">
              <input type="radio" id="tank" name="role" value="tank">
              <input type="radio" id="mdps" name="role" value="mdps">
              <input type="radio" id="rdps" name="role" value="rdps">
              <input type="radio" id="healer" name="role" value="healer">
           </div>


           <!-- Check Boxes -->
            <script>
                  $(function() {
                    $( "#check" ).button();
                    $( "#format" ).buttonset();
                  });
            </script>


            <!-- Checkboxes for Classes -->
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
            </div>

            <!--       Session inputs for AJAX      -->
            <?php 
            echo "
                <input type=\"hidden\" name =\"chosen-guild\" value=\"$guild\">
                <input type=\"hidden\" name =\"chosen-server\" value=\"$realm\">
                <input type=\"hidden\" name =\"chosen-region\" value=\"$region\"> ";
            ?>

            <script>
                  $(function() {
                    $( "#check" ).button();
                    $( "#format" ).buttonset();
                  });
            </script>

            <!-- Text Box for Custom Post Description -->
            <h2 class="anchor">POSITION DESCRIPTION</h2>
              <textarea id="textarea" name="textarea"></textarea>


<!--       SUBMIT BUTTON -->
      <button id="sub" class="button button-blue">Submit</a>

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

<!--       AJAX: send user inputs to server, post message on submission -->
  <script type="text/javascript">
  $("#sub").click( function() {
 $.post( $("#guildForm").attr("action"), 
         $("#guildForm :input").serializeArray(), 
         function(data){ 
          if (data == 'Listing Created'){
            alert("Form Submitted");
          }else{
            alert("Unsuccesful Submission");
          }  
   });
 clearInput();
});
 
$("#guildForm").submit( function() {
  return false; 
});
 
function clearInput() {
  $("#guildForm :input").each( function() {
     $(this).val('');
  });
}
  </script>

</body>

</html>