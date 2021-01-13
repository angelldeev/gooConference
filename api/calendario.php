<?php include_once "include/templates/header.php"; ?>

    <section>
        <div class="seccion contenedor">
            <h1>Las mejores conferencias en el pais</h1>
        </div>
        <div class="seccion contenedor">
            <h1>Calendario de eventos</h1>
            <?php 
                try {
                    require_once('include/functions/dbconection.php');
                    $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " ORDER BY evento_id ";
                    $resultado = $conn->query($sql);

                } catch(\Exception $e){
                    $e->getMessage(); 
                }
            
            ?>

            <div class="calendario-style">
                <?php 
                    $calendario = array();
                   while($eventos = $resultado->fetch_assoc()){

                       $fecha = $eventos['fecha_evento'];
                       $evento = array(
                        'titulo' => $eventos['nombre_evento'],
                        'fecha' => $eventos['fecha_evento'],
                        'hora' => $eventos['hora_evento'],
                        'categoria' => $eventos['cat_evento'],
                        'icono' => 'fas'." ". $eventos['icono'],
                        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                       );

                       $calendario[$fecha][] = $evento; 
                       ?>
                       
                   <?php } ?>

                   <?php 
                    //Imprimir eventos
                       foreach($calendario as $dia => $lista_eventos){ ?>
                       <figure class= "calendar-obj">
                        <h2>
                            <i class="fas fa-calendar-alt"></i>
                            <?php 
                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                echo strftime('%A, $D, de %B del %Y', strtotime($dia) ); ?>
                        </h2>
                        <?php 
                            foreach($lista_eventos as $evento) { ?>
                                <div class="dia">
                                    <h3 class="titulo"> <?php echo $evento['titulo']; ?></h3>
                                    <p class="hora"><i class="fas fa-clock" aria-hidden="true"></i> 
                                    <?php echo $evento['fecha'] . " " . $evento['hora']; ?> </p>
                                    <p><i class="<?php echo $evento['icono']; ?>"></i><?php echo $evento['categoria']; ?></p>
                                    <p>
                                        <i class="fas fa-user"></i>
                                        <?php echo $evento['invitado']; ?>
                                    </p>

                                </div>
                            <?php } // Fin FOREACH LISTA?>
                        </figure>        
                    <?php } //FIN FOREACH LISTA CALENDARIO?>
            </div>

            <?php 
                $conn->close();
            ?>
        </div>
    </section>
  
<?php include_once "include/templates/footer.php"; ?>