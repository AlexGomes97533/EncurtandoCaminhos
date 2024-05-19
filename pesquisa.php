<?php
  include 'conectarBancoDados.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Encurtando Caminhos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/eventos.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Author: Alex Gomes da Silva
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Encurtando Caminhos</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="pesquisa.php#resultados" class="">Resultados</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>

  <main class="main">

    <!-- inicio -->

    </section><!-- /Eventos Intermediario Section -->

    <!-- Services Section -->
    <section id="resultados" class="services section">

      <!-- Evento Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resultados:</h2>
        <p>Confira os resultados da sua pesquisa por: 
          <?PHP
            $termBuscado = $_POST['valorBusca'];
            echo("<strong>".$_POST['valorBusca']."</strong>");
            $sql = "SELECT
                        tbl_evento.id,
                        tbl_evento.nome AS nomeEvento,
                        data,
                        cep,
                        rua,
                        numero,
                        bairro,
                        complemento,
                        cidade,
                        resumo,
                        tbl_usuario.nome,
                        entrada
                        FROM tbl_evento JOIN tbl_usuario ON tbl_usuario.id = tbl_evento.organizador WHERE tbl_evento.nome LIKE '%$termBuscado%'";
            $result = $conn->query($sql);
            //var_dump($result);
          ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <?php
            if ($result->num_rows > 0) {
              // Exibe os dados em uma tabela HTML       
              // Itera sobre cada linha de resultado
              while($row = $result->fetch_assoc()) {
                echo(
                '<div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item d-flex">
                    <div>
                      <h4 class="title"><a href="#" class="stretched-link">'.$row["nomeEvento"].' - '.$row["data"].' - '.$row["bairro"].'</a></h4>
                      <p class="description"><strong>Resumo do Evento:</strong> '.$row["resumo"].'. </br><strong>Organzado Por: </strong>'.$row["nome"].'. </br> <strong>Local: </strong>'.$row["rua"].' '.$row["numero"].' '.$row["complemento"].' '.$row["cep"].'
                      </br><class="description"><strong>Entrada: </strong>'.$row["entrada"].'</p>                    
                      </div>
                  </div>
                </div>'
                );
              }
            } else {
              echo(
                '<div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item d-flex">
                    <div>
                      <h4 class="title"><a href="#" class="stretched-link">Ops!</a></h4>
                      <p class="description">Não encontramos eventos com essa chave de busca.</p>                    
                      </div>
                  </div>
                </div>'
                );
            }
            // Fecha a conexão ao final do script                    
          ?>         

        </div>
          </br>

        <div class="row gy-4">
            <?PHP
                $sql = "SELECT
                              tbl_servico.id AS 'id',
                              tbl_servico.nome AS 'nomeServico',
                              cep,
                              rua,
                              numero,
                              bairro,
                              complemento,
                              contato,
                              cidade,
                              tbl_usuario.nome AS 'nomeResponsavel',
                              tbl_tipoServico.tipo
                            FROM tbl_servico 
                            JOIN tbl_tipoServico ON tbl_servico.tbl_tipoServico_id = tbl_tiposervico.id
                            JOIN tbl_usuario ON tbl_servico.tbl_usuario_id = tbl_usuario.id
                            WHERE tbl_servico.nome LIKE '%$termBuscado%'";
                $result = $conn->query($sql);
                //var_dump($result);
              ?>
              
              <?php
                if ($result->num_rows > 0) {
                  // Exibe os dados em uma tabela HTML       
                  // Itera sobre cada linha de resultado
                  while($row = $result->fetch_assoc()) {
                    echo(
                    '<div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item d-flex">
                        <div>
                          <h4 class="title"><a href="https://wa.me/55'.$row["contato"].'" class="stretched-link">'.$row["nomeServico"].' - '.$row["bairro"].'</a></h4>
                          <p class="description"><strong>Profissional: </strong>'.$row["nomeResponsavel"].'. </br> <strong>Local: </strong>'.$row["rua"].' '.$row["numero"].' '.$row["complemento"].' '.$row["cep"].'
                          </br><class="description"><strong>Tipo de Serviço: </strong>'.$row["tipo"].'
                          </br><strong>WhatApp: </strong>55'.$row["contato"].'
                          </p>                    
                          </div>
                      </div>
                    </div>'
                    );
                  }
                } else {
                  echo(
                    '<div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item d-flex">
                        <div>
                          <h4 class="title"><a href="#" class="stretched-link">Ops!</a></h4>
                          <p class="description">Não encontramos profissionais com essa chave de busca.</p>                    
                          </div>
                      </div>
                    </div>'
                    );
                }
                // Fecha a conexão ao final do script                    
              ?> 
        </div>
      </div>

    </section><!-- /Services Section -->


  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Encurtando Caminhos</span>
          </a>
          <p>Procuramos formas de tornar a sua vida mais bonita e simples.</p>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Confira Eventos</h4>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Confira Serviços</h4>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Confira Profissionais</h4>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <div class="credits">
        Desenvolvido por: Projeto Integrador Univesp
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>