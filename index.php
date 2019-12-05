<?php require 'config.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Character Creator</title>

  <!-- Standard meta declarations. -->
  <meta charset="utf-8">
  <meta name="viewport">

  <!-- Bootstrap 4.0 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">

    <!-- This div defines the row class. -->
        <div class="row">

        <!-- This div's class defines all of our elements col sizes and locations. -->
            <div class="col-xl-5 mx-auto text-center p-5">
            <h2>Create your character</h2>
            <br>
                <form method="POST">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Character name" name="name" maxlength="50">
                    </div>

                    <div class="form-group">
                        <label>Division:</label>
                            <select class="form-control form-control-sm" name="race" required>

                            <!-- These extra parameters after the option tag disables, select this option by default and sets its value to null, therefore triggering the 'required' submit prevention if this option is submitted. -->
                            <option disabled selected value> -- select an option -- </option>

                            <!-- This foreach set $divisions as $key and $value so it can be used to fill the option list with wathever this array has. -->
                            <?php
                            foreach($divisions as $key => $value):
                            echo '<option value="'.$key.'">'.$value.'</option>';
                            endforeach;
                            ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label class="label">Race:</label>
                            <select class="form-control form-control-sm" name="race" required>

                            <!-- These extra parameters after the option tag disables, select this option by default and sets its value to null, therefore triggering the 'required' submit prevention if this option is submitted. -->
                            <option disabled selected value> -- select an option -- </option>

                            <!-- This foreach set $races as $key and $value so it can be used to fill the option list with wathever this array has. -->
                            <?php
                            foreach($races as $key => $value):
                            echo '<option value="'.$key.'">'.$value.'</option>';
                            endforeach;
                            ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Character Bio:</label>
                        <textarea class="form-control" rows="5" id="bio" maxlength="400"></textarea>
                        <span class="bio"></span>
                    <div>    
                    <br>

                    <!-- This button has the float-right property made available on Bootstrap 4 -->
                    <button class="btn btn-primary float-right" type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
        <?php require 'footer.php' ?>
    </div>

    <!-- Jquery scripts for Boostrap 4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- This script reaches for #bio's maxlenght on keyup so as to make a validation and display a counter of the current characters available -->
    <script type="text/javascript">
    $('#bio').on('focus keyup', function (e) {
	var ml = this.getAttribute('maxlength');
	var c = $('.' + this.id);
	var tv = this.value;
	var l = tv.length;
	if (e.type === 'focus') {
		c.append('(<span class="charLeft"></span> characters left of <span class="charTotal"></span>)');
		c.children('.charLeft').text(ml - l);
		c.children('.charTotal').text(ml);
		$(this).off('focus');
	} else {
		var v = 0;
		(l >= ml) ? $(this).val(tv.substring(0, ml)) : v = ml - l;
		c.children('.charLeft').text(v);
	}
    });
    </script>

</body>
</html>



