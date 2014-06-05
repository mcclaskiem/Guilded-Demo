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

  <!-- NAV BAR -->
  <form id="searchForm" action="../index.php" method="post">
            <div id='cssmenu'>
              <ul>
                 <li class='active'><a href='../index.html'><span>Find Guild</span></a></li>
                 <li><a href='../index.html'><span>Recruiting Post</span></a></li>
                 <li><a href='../index.html'><span>Guilds</span></a></li>
                 <li class='../index.html'><a href='#'><span>Profile</span></a></li>
              </ul>
            </div>
      <center>


      <!-- This section displays the results from 'submitSearch.php' -->      
        <div id="results-container">
          <h1 class="anchor">Browse Search Results</h1>
            <div id="results-page"> 
              <!-- PHP Include -->
            <?php
              include ('submitSearch.php');
              results();
            ?> 

            <!-- Button to Apply -->
            </div>
              <button id="apply-button">Apply</button>
        </div>

      </center>
      <!-- Javascript for Chosen Dropdowns -->
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