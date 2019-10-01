<style>
    h1{
        font-size: 18px;
        background: #b8b3b2;
        border: 0.5px solid #616161;
        border-radius: 5px;
        align-items: center;
    }
    h2{
        font-size: 14px;
    }
    span{
        font-size: 14px;
    }
    table {
        border-spacing: 5;
        font-size: 18px;
        border: 1px;

    }
    th{
        background: #9fd4fc;
        border-radius: 3px 3px 3px 3px;
    }
</style>
<div class="jumbotron">
    <h1>Sistema de Control de Obra</h1>
    <h2><?= $array[0]['cabecera']['id'] ?></h2>
    <span><p>Responsable: <?= $array[0]['cabecera']['solicita'] ?></p></span>
    <span><p>Comentario: <?= $array[0]['cabecera']['fiscalizador'] ?></p></span>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Fiscalizacion</th>
            <th>Diferencia</th>
            <th>Observacion</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($array[0]['actividad'] as $key => $actividad) {
            $k = $key + 1;
            echo '<tr><td scope="row">' . $k . '</td>'
                . '<td scope="row">' . $actividad['item'] . '</td>'
                . '<td scope="row">' . $actividad['descripcion'] . '</td>'
                . '<td scope="row">' . $actividad['cantidad'] . '</td>'
                . '<td scope="row">' . $actividad['cantFis'] . '</td>'
                . '<td scope="row">' . $actividad['diferencia'] . '</td>'
                . '<td scope="row">' . $actividad['comentario'] . '</td>';
        }
        ?>
        </tbody>
    </table>
</div>
<p>Por favor ingrese al <a href="http://10.100.1.51/proyecto/web">sistema de control de Obra</a> para su ejecución</p>
<p>Saludos: Administrador del sistema</p>