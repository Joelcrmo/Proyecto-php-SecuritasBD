<!DOCTYPE html>
<html>

<?php
include "componentes/head.php";
require "modelo/tecnico.php";
?>

    <head>
        <title>Securitas Tecnología</title>

    </head>

    <body>
        <header>
            <div class="container-fluid">
                <div class="jumbotron">
                    <h1>Securitas Tecnología</h1>
                </div>
            </div>
        </header>
        
        <div align="center">
        <h4 class="salame">Bienvenidos al programa de Securitas Tecnología</h4>
        </div>
        
        <br>
        
        <table align="center">
            <tr>
                <td>
                    <div class="container">
                        <a href="verTecnico.php">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Ver Tecnicos
                        </a>
                    </div>
                </td> 
                <td>
                    <div class="container">
                        <a href="verTrabajos.php">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Ver Trabajos
                        </a>
                    </div>
                </td>
                <td>
                    <div class="container">
                        <a href="verMateriales.php">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Ver Materiales
                        </a>
                    </div>
                </td> 
                <td>
                    <div class="container">
                        <a href="verSubcontratas.php">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Ver Subcontratas
                        </a>
                    </div>
                </td> 
            </tr>
        </table>

    </body>
</html>