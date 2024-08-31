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
                    &copy; <?php echo date('Y'); ?> Copyright: <a href="https://github.com/EdisonGonzalezA/OpticaSooleil" target="_blank" class="text-white">Grupo6</a>
                </p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .whatsapp-container {
            position: fixed;
            bottom: 50px;
            right: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .whatsapp-container:hover {
            transform: scale(1.1);
        }

        .whatsapp-icon {
            width: 55px;
            height: 50px;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg');
            background-size: cover;
            margin-right: 10px;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .whatsapp-text {
            font-size: 18px;
            color: #25D366;
        }
    </style>
    </head>

    <body>
        <div class="whatsapp-container" onclick="window.open('https://wa.me/593969866869?text=Hola, me gustaría más información', 'sobre sus servicios')">
            <div class="whatsapp-icon"></div>
            <div class="whatsapp-text">Hola soy tu asistente virtual</div>
        </div>


</footer>
<!-- Asegúrate de tener FontAwesome incluido para los íconos -->
<script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>