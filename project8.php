<!DOCTYPE html>
<html lang="en">

<?php
/* All-in-one form processor, Version 2.
 *
 *   -- If a request was sent, it processes the form.
 *   -- If not responding to a request, it generates the form.
 *
 * This version processes the data by printing it 3 ways:
 *  (1) the raw data is dumped, using print_r.
 *  (2) each expected form element is nicely printed with a label.
 *     ==>This version tests whether checkbox and options set, and varies output accordingly.
 *  (3) a list of all received data is printed in name=value format.
 *
 * This version also differs from Version 1 by self-configuring the
 * form action using $_SERVER['SCRIPT_NAME'] to get its own name.
 */

// if $_POST is set, then we have a form submission to process
 if( $_POST )
 {
?>

<head>
  <title>Form Data Version 2</title>
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
<p>Your Name: <?php print htmlspecialchars($_POST["visitor_name"]) ?></p>
<p>Password: <?php print htmlspecialchars($_POST["password"]) ?></p>

<!-- Handle checkbox specially: if box not checked, value not set. -->
<?php if( isset($_POST["licenseOK"]) ) { ?>
  <p>License accepted</p>
<?php } else { ?>
  <p>License declined</p>
<?php } ?>

<p>Account type: <?php print htmlspecialchars($_POST["account_type"]) ?></p>

<!-- Handle multiple select specially: if no options selected, value not set. -->
<?php if( isset($_POST["options"]) ) { ?>
<p>Options: <?php print htmlspecialchars($_POST["options"]) ?></p>
<?php } else { ?>
<p>No options selected</p>
<?php } ?>

<p>Operating system: <?php print htmlspecialchars($_POST["system"]) ?></p>
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
<label for="yourName">Your Name:</label>
  <input name="visitor_name" id="yourName" type="text" value="Harry Bovik" /></p>
<p>
<label for="password">Password:</label>
  <input name="password" id="password" type="password" value="TopSecret" /></p>
<p>

<label><input name="licenseOK" type="checkbox" />
  I accept</label> the license conditions.</p>

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
Select your operating system:
<select name="system">
  <option selected="selected"> Windows</option>
  <option> Mac</option>
  <option> Unix</option>
</select></p>

<p>
Select your optional features:
<select name="options" size="3" multiple="multiple">
  <option selected="selected">Chat</option>
  <option>Email</option>
  <option>File transfer</option>
  <option>Directory</option>
  <option>Shell</option>
  <option>Remote control</option>
</select></p>

<p>
Please write your comments here.
<br />
<textarea name="remarks" rows="10" cols="25">
I'm very pleased with your service!!!
</textarea></p>

<p>
<input type="submit" value="Sign Up" />
<input type="reset" /></p>
</fieldset>
</form>
<?php
  } // end of ! $_POST
?>
</body>
</html>
 