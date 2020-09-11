<?php include_once "include/templates/header.php"; ?>
    <section>
        <div class="seccion contenedor">
            <h1>Las mejores conferencias en el pais</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, minus dolor! Et, illum! Earum fugiat, perspiciatis eaque ab velit molestiae minus asperiores iusto sint quos quas ratione aspernatur optio! Illum.</p>
        </div>
       
    </section>
    <!--Video BAckground-->
    <section class="program">
        <div class="contenedor-video">
            <video autoplay loop poster="">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv">
            </video>
        </div>
        <!-- Cierre VIdeo-->
        <div class="programa-contenido">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>PROGRAMA DE EVENTO</h2>

                    <?php 
                        try {
                        require_once('include/functions/dbconection.php');
                        $sql = " SELECT * FROM `categoria_evento` ";
                        $resultado = $conn->query($sql);

                        } catch(\Exception $e){
                            $e->getMessage(); 
                        }
            
                    ?>

                    <nav class="menu-program">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                            <a href="#<?php echo strtolower($categoria); ?>">
                            <i class="fa <?php echo $cat['icono']; ?>"></i> <?php echo $categoria ?></a>
                        <?php } ?>                        
                    </nav>
                        <?php 
                            try {
                            require_once('include/functions/dbconection.php');
                            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 1 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 2 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 3 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";

                            } catch(\Exception $e){
                            $e->getMessage(); 
                            }
                        ?>  
                        <?php $conn->multi_query($sql); ?>

                        <?php 
                            do {
                                $resultado = $conn->store_result();
                                $row = $resultado->fetch_all(MYSQLI_ASSOC);  ?>

                                <?php $i = 0; ?>
                                <?php foreach($row as $evento): ?>
                                <?php if($i % 2 == 0 ){ ?>
                                <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-taller ocultar">
                                <?php } ?>
                                    <div class="detalle-evento">
                                        <h2><?php echo ($evento['nombre_evento']) ?></h2>
                                        <p><i class="fa fa-clock "></i><?php echo $evento['hora_evento'] ?></p>
                                        <p><i class="fa fa-calendar "></i><?php echo $evento['fecha_evento'] ?></p>
                                        <p><i class="fa fa-user "></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'] ?></p>
                                    </div>
                                    <?php if ($i % 2 == 1): ?>
                                        <a href="calendario.php" class="btn btn-info float-right clearfix" >Ver todos</a>
                                    </div>
                                    <?php endif;  ?>
                               
                                <?php $i++; ?>
                                <?php endforeach; ?>
                                <?php $resultado->free(); ?>
                            <?php } while ($conn->more_results() && $conn->next_result()); ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php include_once "include/templates/invitados.php"; ?>


    <div class="contador-class parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"> </p>
                    <p>Invitados</p>
                </li>
                <li>
                    <p class="numero"> </p>
                    <p>Talleres</p>
                </li>
                <li>
                    <p class="numero"> </p>
                    <p>Dias</p>
                </li>
                <li>
                    <p class="numero"> </p>
                    <p>Conferencias</p>
                </li>
            </ul>
        </div>
    </div>

    <section class="precios section">
        <h2>PRECIOS</h2>
        <div class="contenedor">
            <ul class="list-precios">
                <li>
                    <div class="tabla-precios">
                        <h2>Pase por dia</h2>
                        <p class="numero">Q180</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Acceso a las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="btn hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precios">
                        <h2>Toda la semana</h2>
                        <p class="numero">Q260</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Acceso a las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="btn btn-comprar">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precios">
                        <h2>Pase 3 dias</h2>
                        <p class="numero">Q220</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Acceso a las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="btn hollow">Comprar</a>
                    </div>
                </li>

            </ul>
        </div>
    </section>
    <div id="map" class="map-content">

    </div>
    <section class="section">
        <h2>TESTIMONIALES</h2>
        <div class="contenedor testimoniales grid">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque repellendus saepe ab totam, minima et sequi veritatis aut! Nam tenetur facilis veniam accusamus numquam, obcaecati tempore in facere maxime explicabo.</p>
                    <footer class="info-testimonial">
                        <img src="img/testimonial.jpg" alt="img-testimonial">
                        <cite>Robin Williams <span>Dise;ador y Publicista</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque repellendus saepe ab totam, minima et sequi veritatis aut! Nam tenetur facilis veniam accusamus numquam, obcaecati tempore in facere maxime explicabo.
                    </p>
                    <footer class="info-testimonial">
                        <img src="img/testimonial.jpg" alt="img-testimonial">
                        <cite>Robin Williams <span>Dise;ador y Publicista</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque repellendus saepe ab totam, minima et sequi veritatis aut! Nam tenetur facilis veniam accusamus numquam, obcaecati tempore in facere maxime explicabo.
                    </p>
                    <footer class="info-testimonial">
                        <img src="img/testimonial.jpg" alt="img-testimonial">
                        <cite>Robin Williams <span>Dise;ador y Publicista</span></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Regristrate para tener las ultimas noticias</p>
            <h2>gooConference</h2>
            <a href="#" class="btn hollow">REGISTRO</a>
        </div>
    </div>
    <section class="section">
        <h2>FALTAN</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p>
                    <p>DIAS</p>
                </li>
                <li>
                    <p id="horas" class="numero"></p>
                    <p>HORAS</p>
                </li>
                <li>
                    <p id="minutos" class="numero"></p>
                    <p>MINUtOS</p>
                </li>
                <li>
                    <p id="segundos" class="numero"></p>
                    <p>SEGUNDOS</p>
                </li>
            </ul>
        </div>
    </section>
    <?php include_once "include/templates/footer.php"; ?>
   