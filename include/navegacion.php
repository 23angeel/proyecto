<nav class="nav">

<div class="nav__container">

    <ul class="dropdown" id="menu">

        <li>
            <a href="index.php?vista=home" class="logo">
                <img src="./Imagenes/Diseño sin título (2).png">
                <span href="index.php?vista=home" class="nav__link">Escuela de Transporte</span>
            </a>
        </li>
        
         <?php
            if ($_SESSION['rol']==1) {
                ?>
                <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/Perfiles_12.svg" width="45">
                <span class="dropdown__span">Usuario</span>
                <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="index.php?vista=usuario_new" class="dropdown__anchor">Registrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="index.php?vista=usuario_list" class="dropdown__anchor">Consultar</a>
                    </li>

                </ul>
                <?php
            }
        ?>


        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/cursos_12.svg" width="45">
                <span class="dropdown__span">Cursos</span>
                <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="index.php?vista=curso_new" class="dropdown__anchor">Resgitrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="index.php?vista=cursos_list" class="dropdown__anchor">Consultar</a>
                    </li>

                    </li>
                </ul>

            </div>
        </li>

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <img src="./Imagenes/Estudiantes_12.svg" width="45">
                <span class="dropdown__span">Estudiante</span>
               <img src="./Imagenes/arrow12.svg" width="30" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">

                    <li class="dropdown__li">
                        <a href="index.php?vista=estudiante_new" class="dropdown__anchor">Resgitrar</a>
                    </li>
                    <li class="dropdown__li">
                        <a href="index.php?vista=estudiantes_list" class="dropdown__anchor">Consultar</a>
                    </li>
                  

                </ul>

            </div>

        </li>
         <li class="dropdown__list">
            <a href="index.php?vista=studies_control" class="dropdown__link">
                <img src="./Imagenes/controlde_12.svg" width="45">
                <span class="dropdown__span">Control de Estudios</span>
            </a>
        </li>
        <br><br><br>
         <li class="dropdown__list">
            <a href="index.php?vista=cerrar_session" class="dropdown__link">
                <img src="./Imagenes/cerrar (12).svg" width="45">
                <span class="dropdown__span">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>
</nav>
<script src="./js/print_pdf.js"></script>