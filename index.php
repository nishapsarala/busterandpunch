<?php

use Src\Boot;
use Src\Engine\Dictionary\Dictionary;
use Src\Engine\Scrabble;

require_once 'Src/Boot.php';

$boot = new Boot();

$dictionary = new Dictionary($boot);

$scrabble = new Scrabble($dictionary);

//$rack = "hjkhkaseiwiq";

/**
 * Engine = $scrabble
 *
 * to run a match use the method matchInDictionary
 * this will return an array of words and scores
 */
//var_dump($scrabble->matchInDictionary($rack));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Scrabble Word</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/style.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
     
}
</head>
<body>
	<div class="content">

		<form  class="form-inline" action='' method="POST">
		  <fieldset>
		    <div id="legend" align="center">
		      <legend class="">Scrabble Word</legend>
		    </div>

			<div class="form-group">
		      <!-- Letters -->
		      <label class="control-label"  for="username">Letters</label>
		        <input type="text" id="rack" name="rack" placeholder="" class="input-xlarge" required="true">
		    </div> 

      		<!-- Button -->
		        <button class="btn btn-success" type="submit" id="submit" name="submit">Search</button>
		  </fieldset>
		</form>

		<table class="display" style="width:100%">
		  <thead>
		    <tr>
		      <th scope="col">Word</th>
		      <th scope="col">Score</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	if(isset($_REQUEST['rack']))
		  		$rack = $_REQUEST['rack'];
		  	else $rack ='';
		  	foreach($scrabble->matchInDictionary($rack) as $words=>$scores){ ?>
		    <tr>
		      <th scope="row"><?php echo $words; ?></th>
		      <td><?php echo $scores; ?></td> 
		    </tr>
		    <?php } ?>
		  </tbody>
		</table>

<script type="text/javascript">
  $(document).ready(function() {
    $('table.display').DataTable();
} );
  
</script>
</div>
</body>
</html>