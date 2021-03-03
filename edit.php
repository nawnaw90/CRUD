<?php
require 'database.php';
if(isset($_POST['save'])) {                
    // Find jeux by Jeux_Id
    $stmt = $conn->prepare('select * from jeux where Jeux_Id = :Jeux_Id');
    $stmt->bindValue('Jeux_Id', $_POST['Jeux_Id']);
    $stmt->execute();
    $jeux = $stmt->fetch(PDO::FETCH_OBJ);
                    
    // Update jeux information
    $stmt = $conn->prepare('update jeux set Jeux_Prix = :Jeux_Prix, Jeux_Titre = :Jeux_Titre, Jeux_Description = :Jeux_Description,
    Jeux_DateSortie = :Jeux_DateSortie, Jeux_PaysOrigine = :Jeux_PaysOrigine, Jeux_Connexion = :Jeux_Connexion, Jeux_Mode = :Jeux_Mode, Genre_Id = :Genre_Id where Jeux_Id = :Jeux_Id');
    $stmt->bindValue('Jeux_Id', $_POST['Jeux_Id']);
    $stmt->bindValue('Jeux_Titre', $_POST['Jeux_Titre']);
    $stmt->bindValue('Jeux_Description', $_POST['Jeux_Description']);
    $stmt->bindValue('Jeux_Prix', $_POST['Jeux_Prix']);
    $stmt->bindValue('Jeux_DateSortie', $_POST['Jeux_DateSortie']);
    $stmt->bindValue('Jeux_PaysOrigine', $_POST['Jeux_PaysOrigine']);
    $stmt->bindValue('Jeux_Connexion', $_POST['Jeux_Connexion']);
    $stmt->bindValue('Jeux_Mode', $_POST['Jeux_Mode']);
    $stmt->bindValue('Genre_Id', $_POST['Genre_Id']);
    $stmt->execute();
    header('location:index.php');
}    
$stmt = $conn->prepare('select * from jeux where Jeux_Id = :Jeux_Id');
$stmt->bindValue('Jeux_Id', $_GET['Jeux_Id']);
$stmt->execute();
$jeux = $stmt->fetch(PDO::FETCH_OBJ);
?>
<form method="post">
    <fieldset>
        <legend>jeux Information</legend>
        <table cellpadding="2" cellspacing="2">
            <tr>
                <td>Jeux_Id</td>
                <td><?php echo $jeux->Jeux_Id; ?>
                    <input type="text" name="Jeux_Id" value="<?php echo $jeux->Jeux_Id; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_Titre</td>
                <td><input type="text" name="Jeux_Titre" value="<?php echo $jeux->Jeux_Titre; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_Description</td>
                <td><input type="text" name="Jeux_Description" value="<?php echo $jeux->Jeux_Description; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_Prix</td>
                <td><input type="text" name="Jeux_Prix" value="<?php echo $jeux->Jeux_Prix; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_DateSortie</td>
                <td><input type="text" name="Jeux_DateSortie" value="<?php echo $jeux->Jeux_DateSortie; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_PaysOrigine</td>
                <td><input type="text" name="Jeux_PaysOrigine" value="<?php echo $jeux->Jeux_PaysOrigine; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_Connexion</td>
                <td><input type="text" name="Jeux_Connexion" value="<?php echo $jeux->Jeux_Connexion; ?>"></td>
            </tr>
            <tr>
                <td>Jeux_Mode</td>
                <td><input type="text" name="Jeux_Mode" value="<?php echo $jeux->Jeux_Mode; ?>"></td>
            </tr>
            <tr>
                <td>Genre_Id</td>
                <td><input type="text" name="Genre_Id" value="<?php echo $jeux->Genre_Id; ?>"></td>
            </tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </fieldset>
</form>