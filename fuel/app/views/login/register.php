<p>Lūdzu aizpildiet reģistrācijas anketu: </p>
<p><span class="star">*</span> - obligāti aizpildāmie lauki </p>
<?php
echo Form::open();
?>

<label for="usermail">E-pasts<span class="star">*</span></label>
<br>
<input type="text" name="usermail" id="usermail" />
<br>
<label for="password">Parole<span class="star">*</span></label>
<br>
<input type="password" name="password" id="password" />
<br>
<label for="password_rep">Parole (atkārtoti)<span class="star">*</span></label>
<br>
<input type="password" name="password_rep" id="password_rep" />
<br>
<input type="Submit" value="Reģistrēties" class="btn btn-primary" />
<?php

echo Form::close();
