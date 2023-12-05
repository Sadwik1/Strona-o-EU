<form action="#" method="POST">
    <label for="id">Id:</label><br>
    <input type="text" name="id" value=<?php echo $_POST["id"] ?>><br>

    <label for="imie">Imie:</label><br>
    <input type="text" name="imie" value=<?php echo $imie ?>><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" value=<?php echo $email ?>><br>

    <label for="status">Subskrypcja?:</label>
    <input type="checkbox" name="status" value=1
    
    <?php
        if($status) echo "checked";
    ?>
    
    ><br>

    <label for="mode">SEARCH?</label>
    <input type="checkbox" checked name="mode" value="add">
    <br>
    <input type="submit" value="ZMIEN USERA">
</form>