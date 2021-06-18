

<div class="home">
<h1>Please Login o Signup</h1>
    <!-- Las anclas son más mañosas no se les cambia el color teniendo la clase en el padre sino hay que apuntarlas y ponerle la clase para ellas -->
   <!-- Por ejemplo si home cambiara el color de fuente, se tendria que poner .home a {color:..}  para cambiarselo. -->
   <!-- Si pusiera solo form.php no busca el archivo aca, lo busca en la raiz por lo tanto hay que especificarle toda la ruta -->
   <a class="button button-primary" href="form.php?accion=login" >Login</a>
    <a class="button button-secondary" href="form.php?accion=signup">Signup</a>
</div>