<?php
require 'database.php';
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $stmt = $conn->prepare('delete from jeux where Jeux_Id = :Jeux_Id');
    $stmt->bindValue('Jeux_Id', $_GET['Jeux_Id']);
    $stmt->execute();
}
$stmt = $conn->prepare('select * from jeux');
$stmt->execute();
?>
<?php
require 'database.php';
if(isset($_POST['save'])) {
    $stmt = $conn->prepare('insert into jeux(Jeux_Id, Jeux_Titre, Jeux_Description, Jeux_Prix, Jeux_DateSortie, Jeux_PaysOrigine, Jeux_Connexion, Jeux_Mode, Genre_Id)
    values(:Jeux_Id, :Jeux_Titre, :Jeux_Description, :Jeux_Prix, :Jeux_DateSortie, :Jeux_PaysOrigine, :Jeux_Connexion, :Jeux_Mode, :Genre_Id)');
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
?>
<br><br>
<table cellpadding="2" cellspacing="2" border="1">
    <tr>
        <th>Jeux_Id</th>
        <th>Jeux_Titre</th>
        <th>Jeux_Description</th>
        <th>Jeux_Prix</th>
        <th>Jeux_DateSortie</th>
        <th>Jeux_PaysOrigine</th>
        <th>Jeux_Connexion</th>
        <th>Jeux_Mode</th>
        <th>Genre_Id </th>
    </tr>
    <?php while($jeux = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
            <td style="width: 5%;"><img src="img/<?php echo $jeux->Jeux_Id; ?>.jpg" alt="" style="width:100%"></td>
            <td><?php echo $jeux->Jeux_Titre; ?></td>
            <td><?php echo $jeux->Jeux_Description; ?></td>
            <td><?php echo $jeux->Jeux_Prix; ?></td>
            <td><?php echo $jeux->Jeux_DateSortie; ?></td>
            <td><?php echo $jeux->Jeux_PaysOrigine; ?></td>
            <td><?php echo $jeux->Jeux_Connexion; ?></td>
            <td><?php echo $jeux->Jeux_Mode; ?></td>
            <td><?php echo $jeux->Genre_Id; ?></td>
        <td><a
                href="index.php?Jeux_Id=<?php echo $jeux->Jeux_Id; ?>
                    &action=delete" onclick="return confirm('Are you sure?')">Delete</a>
                | <a href="edit.php?Jeux_Id=<?php echo $jeux->Jeux_Id; ?>">Edit</a>
            </td>
        </tr>
    <?php } ?>
</table>


<form method="post">
    <fieldset>
        <legend>jeux Information</legend>
        <table cellpadding="2" cellspacing="2">
            <tr>
                <td>Jeux_Id</td>
                <td><input type="text" name="Jeux_Id"></td>
            </tr>
            <tr>
                <td>Jeux_Titre</td>
                <td><input type="text" name="Jeux_Titre"></td>
            </tr>
            <tr>
                <td>Jeux_Description</td>
                <td><input type="text" name="Jeux_Description"></td>
            </tr>
            <tr>
                <td>Jeux_Prix</td>
                <td><input type="text" name="Jeux_Prix"></td>
            </tr>
            <tr>
                <td>Jeux_DateSortie</td>
                <td><input type="text" name="Jeux_DateSortie"></td>
            </tr>
            <tr>
                <td>Jeux_PaysOrigine</td>
                <td><input type="text" name="Jeux_PaysOrigine"></td>
            </tr>
            <tr>
                <td>Jeux_Connexion</td>
                <td><input type="text" name="Jeux_Connexion"></td>
            </tr>
            <tr>
                <td>Jeux_Mode</td>
                <td><input type="text" name="Jeux_Mode"></td>
            </tr>
            <tr>
                <td>Genre_Id</td>
                <td><input type="text" name="Genre_Id"></td>
            </tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </fieldset>
</form>