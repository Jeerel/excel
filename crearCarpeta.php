<?php
    $msg = null;
    if (isset ($_POST["directorio"]))
    {
        $carpeta = htmlspecialchars($_POST["carpeta"]);
        $directorio = 'carpetas/'.$carpeta;

        if(!is_dir($directorio))
        {
            $crear = mkdir($directorio, 0777, true);

            if($crear)
            {
                $msg = "Directorio $directorio creado correctamente";
            }
        }
        else
        {
            $msg = "El directorio que intentas crear ya existe";
        }
    }
?>

<html>
    <head>
    </head>
    <body>
        <h3>Crear carpetas</h3>
        <strong><?php echo $msg?></strong>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <table>
                <tr>
                    <td>Carpeta: </td>
                    <td><input type="text" name="carpeta"></td>
                </tr>
            </table>
            <input type="hidden" name="directorio">
            <input type="submit" value="Crear">
        </form>
    </body>
</html>