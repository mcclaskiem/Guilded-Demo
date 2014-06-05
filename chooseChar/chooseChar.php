<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Guilded</title>


  <!-- Global CSS Files -->
  <link rel="stylesheet" href="../docsupport/style.css">
  <link rel="stylesheet" href="../docsupport/prism.css">
  <link rel="stylesheet" href="../docsupport/nav-bar.css">


  <!-- Page Specific CSS Files -->
  <link rel="stylesheet" href="chosen.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../js_bin/chosen.jquery.js" type="text/javascript"></script>
  <script src="../docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

  <!-- Beginning of Form -->
  <form id="charForm" action="../searchFOrm/searchForm.php" method="post">
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
          <h1 id="guilded">Choose Character</h1>
        </header>


          <!-- Character name Input -->
          <h2 class="anchor">CHARACTER</h2>
          <div>
            <div class="side-by-side clearfix">
              <input type="text" class="guild-input" style="width:350px;" name="name">
            </div>
          </div>

          <!-- Region Selection Dropdown -->
      <h2 class="anchor">REGION</h2>
      <div class="side-by-side clearfix">
        <div>
           <select data-placeholder="Choose a Region" name="chosen-region" class="chosen-select" style="width:350px;" tabindex="2">
            <option value=""></option>
            <option value="North America">North America</option>
            <option value="South America">South America</option>
            <option value="Europe">Europe</option>
            <option value="Asia">Asia</option>
            <option value="Oceanic">Oceanic</option>
          </select>
        </div>
      </div>


      <!-- Server Selection Dropdown -->
      <h2 class="anchor">SERVER</h2>
      <div class="side-by-side clearfix">
        <div>
           <select data-placeholder="Choose a Server" name="chosen-server" class="chosen-select" style="width:350px;" tabindex="2">
            <option value=""></option>
           <?php
                // Displays full US realm list
                $file = fopen('../assets/realms_dropdown.txt',"r");
                while (!feof($file))
            {
                // Get the current line that the file is reading
                $currentLine = fgets($file) ;
                echo $currentLine ;
            }

            ?>
          </select>
        </div>
      </div>

      <!-- Custom Jquery Scripts -->
      <link href="../js_bin/jquery-ui-1.10.4.custom.css" rel="stylesheet">
      <script src="../js_bin/jquery-1.10.2.js"></script>
      <script src="../js_bin/jquery-ui-1.10.4.custom.js"></script>
          </head>
          <body>
        <h2 class="anchor">ROLE</h2>
          <div id="role">
              <input type="radio" id="tank" name="role" value="tank">
              <input type="radio" id="mdps" name="role" value="mdps">
              <input type="radio" id="rdps" name="role" value="rdps">
              <input type="radio" id="healer" name="role" value="healer">
           </div>

            <script>
                  $(function() {
                    $( "#check" ).button();
                    $( "#format" ).buttonset();
                  });
            </script>

<!--       SUBMIT BUTTON -->
      <button id="sub" class="button button-blue">Select Character</a>

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