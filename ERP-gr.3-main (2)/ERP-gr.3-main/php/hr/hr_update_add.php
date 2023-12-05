<form action="#" method="POST">
    <label for="id">Id:</label><br>
    <input type="text" name="id" value=<?php echo $_POST["id"] ?>>
    <br>
    <label for="imie">Imie:</label><br>
    <input type="text" name="imie" value=<?php echo $imie ?>>
    <br>
    <label for="nazwisko">Nazwisko:</label><br>
    <input type="text" name="nazwisko" value=<?php echo $nazwisko ?>>
    <br>
    <label for="data_ur">Data urodzenia:</label>
    <input type="date" name="data_ur" value=<?php echo $data_ur ?>>
    <br>
    <label for="clearance">Poziom uprawnień:</label>
    <input type="text" name="clearance" value=<?php echo $clearance ?>>
    <br>
    <label for="department">Departament:</label>
    <input type="text" name="department" value=<?php echo $department ?>>
    <br>

    <label for="mode">SEARCH?</label>
    <input type="checkbox" checked name="mode" value="add">
    <br>
    <input type="submit" value="ZMIEN PRACOWNIKA">
</form>