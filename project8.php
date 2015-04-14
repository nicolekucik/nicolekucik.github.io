<!DOCTYPE html>
<html lang="en">

<?php
 if( $_POST )
 {
?>

<head>
  <title>Project 8: php form handler</title>
  <meta charset="utf-8">
</head>
<body>

<h1>Raw Form Data</h1>
<pre>
<?php
  // (1) Print the associative array to see raw data.
  // To avoid HTML injection, escape all HTML special chars
   print htmlspecialchars(print_r($_POST,true));
?>
</pre>

<!-- (2) Extract each form item from posted data -->
<h1>Form input values</h1>
<!-- Handle checkbox specially: if box not checked, value not set. -->

<p>Account type: <?php print htmlspecialchars($_POST["account_type"]) ?></p>

<!-- Handle multiple select specially: if no options selected, value not set. -->
<?php if( isset($_POST["options"]) ) { ?>
<p>Options: <?php print htmlspecialchars($_POST["options"]) ?></p>
<?php } else { ?>
<p>No options selected</p>
<?php } ?>

<p>Remarks: <?php print htmlspecialchars($_POST["remarks"]) ?></p>

<!-- (3) Run thru all elements of the array of posted data -->
<h1>All Form Data</h1>
<?php
    foreach($_POST as $key=>$val)
    {
        print "<p>".htmlspecialchars($key)." = ".htmlspecialchars($val)."\n</p>";
    }
?>


<?php
/**************** End processing part, start of form ***************/

// No $_POST, put out the form
  } else /* ! $_POST */
  {
?>
<head>
  <title>HTML Form</title>
  <meta charset="utf-8">
  <style type="text/css">
    fieldset { background-color: #c8fbc8 }
  </style>
</head>
<body>
<h1>Sign Up Now!</h1>
<form action="<?php print $_SERVER['SCRIPT_NAME'] ?>" method="post">
<fieldset>
<legend><b><i>Enter Information</i></b></legend>

<p>
Specify account type desired:
<br />
<input name="account_type" id="basicAccount" type="radio" value="basic" />
 <label for="basicAccount">Basic ($25)</label>
<br />
<input name="account_type" id="standardAccount" type="radio" value="standard" checked="checked" />
 <label for="standardAccount">Standard ($50)</label>
<br />
<input name="account_type" id="deluxeAccount" type="radio" value="deluxe" />
 <label for="deluxeAccount">Deluxe ($100)</label>
<br />
<input name="userid" type="hidden" value="137273" /></p>

<p>
<input type="submit" value="Learn More" />
<input type="reset" /></p>
</fieldset>
</form>
<?php
  } // end of ! $_POST
?>
</body>
</html>
 