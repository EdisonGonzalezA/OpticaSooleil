<footer class="footer text-lg-start bg-primary bg-gradient mt-auto">
    <div class="container text-md-start pt-2 pb-1">
        <!-- Grid row -->
        <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-12 col-lg-3 col-sm-12 mb-2">
                <!-- Content -->
                <p class="text-white h3">
                    Óptica Sooleil
                </p>
                <p class="mt-1 text-white">
                    &copy; <?php echo date('Y'); ?> Copyright: <a href="https://github.com/EdisonGonzalezA" target="_blank" class="text-white">Grupo6</a>
                </p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Contenedor para el widget de WhatsApp y el título -->
    <div style="position: relative; display: inline-block;">
        <!-- Título sobre el ícono de WhatsApp -->
        <span style="
        position: absolute;
        top: -135px; /* Ajusta la posición vertical del título */
        left: 100%;
        transform: translateX(920%);
        background-color: #25d366;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        white-space: nowrap;
    ">
            Hola, soy tu asistente Virtual
        </span>
        <!-- Widget de WhatsApp -->
        <a href="https://api.whatsapp.com/send?phone=+593969866869&text=Hola,%20necesito%20más%20información%20sobre%20los%20servicios%20que%20presta%20la%20óptica." class="whatsapp-button" target="_blank">
            <i class="fab fa-whatsapp whatsapp-icon"></i>
        </a>
    </div>

    <!-- Estilos para el botón de WhatsApp -->
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            padding: 15px;
            z-index: 1000;
            animation: bounce 2s infinite;
        }

        .whatsapp-button:hover {
            background-color: #20b858;
            color: white;
            text-decoration: none;
            transform: scale(1.1);
        }

        .whatsapp-icon {
            font-size: 80px;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }
    </style>
</footer>
<!-- Asegúrate de tener FontAwesome incluido para los íconos -->
<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>