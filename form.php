<?php

/* Talvez se podrian agregar otras caracterisiticas de forma menos compleja si el form no fuera reutilizable */
require_once('model/user.php');
require_once('includes/authenticate.php');
if (isAuthenticated()) {

    header('Location: includes/content.php');
}



/* Reutilizo el formulario para login y para el registro */

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];


    if ($accion !== 'login' && $accion !== 'signup') {
        die('Acción incorrecta');
    }
    $mostrarOtroCampoPassword = false;



    if ($accion === 'signup') {
        $mostrarOtroCampoPassword = true;
    }
    $accionContraria = $accion === 'login' ? 'signup' : 'login';
}


?>



<?php
/*Form.php es llamado desde un link, no está incrustado, y no está heredando los estilos
Pero si está en la raiz si hereda los estilos, siendo llamado desde un link*/
include('includes/header.php');
?>

<h1><?= $accion ?></h1>
or
<a href="form.php?accion=<?= $accionContraria ?>"><?= $accionContraria ?></a>
<br>
<br>

<?php if (isset($_SESSION['message'])) : ?>
    <p><?= $_SESSION['message'] ?></p>
<?php endif;
unset($_SESSION['message']); ?>


<form class="form" action="includes/<?= $accion ?>.php" method="post">
    <!-- El required se puede cambiar en inspeccionar elemento -->
    <input type="text" placeholder="user or email" name="userName" required>
    <input type="password" placeholder="enter password" name="password" requerid>
    <?php if ($mostrarOtroCampoPassword) { ?>
        <input type="password" placeholder="confirm password" name="password2" required>

    <?php } ?>
    <input class="button button-primary" type="submit" name="sent" id="" value="sent">


</form>

<?php
include('includes/footer.php');
?>