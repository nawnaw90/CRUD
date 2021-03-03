<?php
require 'database.php';
if(isset($_POST['save'])) {
    $stmt = $conn->prepare('Insert into genre(Genre_Id, Genre_Titre, Genre_Description)
    values(:Genre_Id, :Genre_Titre, :Genre_Description)');
    $stmt->bindValue('Genre_Id', $_POST['Genre_Id']);
    $stmt->bindValue('Genre_Titre', $_POST['Genre_Titre']);
    $stmt->bindValue('Genre_Description', $_POST['Genre_Description']);
    //$stmt->bindValue('email', $_POST['email']);
    $stmt->execute();
    header('location:index.php');
}
?>
<form method="post">
    <fieldset>
        <legend>Genre</legend>
        <table cellpadding="2" cellspacing="2">
            <tr>
                <td>Genre_Id</td>
                <td><input type="text" name="Genre_Id"></td>
            </tr>
            <tr>
                <td>Genre_Titre</td>
                <td><input type="password" name="Genre_Titre"></td>
            </tr>
            <tr>
                <td>Genre_Description</td>
                <td><input type="text" name="Genre_Description"></td>
            </tr>
            <!--<tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>-->
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </fieldset>
</form>
        