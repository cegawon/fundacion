<?php 
  session_start();
  require('conexion.php');   
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Fundación </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/estilos.css" rel="stylesheet">
    
  </head>

  <body class="bg-white">
    <header>
      <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
            <div class="hamburguesa">
              <i class="bi bi-list" style="font-size: 50px; color: #0CA438;"></i>
            </div>
            <div class="d-flex a22">
              <div class="vr"></div>
            </div> 
            <div class="logo">
              <img class="logo1" src="docs/images/logo.png" >
            </div>

            <img class="a25" src="docs/images/lupa.png">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="menu">
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
            <div class="navbar-nav">
              <div class="d-flex a23">
                <div class="vr"></div>
              </div>
              <button type="botton" class="sesion fw-bold btn-sm">INICIAR SESIÓN</button>
              <button class="registrarse btn fw-bold">REGISTRASE</button>                  
            </div>
          </div>          
        </div>            
        </div>                  
      </nav>
      <hr class="linea"> 
      
      
    </header>
    <div class="input-wrapper">
      <input class="input text-center" type="text"  placeholder=" ¿Como va mi I.E?">
      <i class="bi bi-search input-icon"></i>
    </div>
    <div class="container">   
       
        <!-- page content -->
      <div class="text-center" role="main">
          <!-- top tiles -->
        <div class="row" style="display: inline-block;"></div>        

          <!-- /top tiles -->    
          <!-- Grafica 1 -->  
          
        <div class="row">
          <div class="a1">
            <div class="card a5" style="border:0px">
                  
                  <div class="a28"><p class="fw-bold a19"> <img src="docs/images/1.png" width="7"><span style="color:#0CA438"> Top 10 </span><span  style="color: #132d1a;">Semanal</span></p></div>                                   
                
                <div class="x_content a24">
                <?php 
                $datos = mysqli_query($conexion,"select id, grado, sum(cantidad) as cant, nombre, municipio  from recolecion group by nombre order by cant desc");
                $colegio = 0;
                while($registros = mysqli_fetch_array($datos))
                { 
                if($colegio == 0){     
                $colegio = 1;    
                ?>             
                  <div class="widget_summary"  style="margin-top: 20px;">                    
                    <div class="col w_center w_55">
                      <div class="progress" > 
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; background-color: #0CA438;">
                          <div class="a16 text-start fw-bold ml-2 text-capitalize"  style="color: #132d1a;" onclick="escoger(<?php echo $registros['id'] ?>)"> <?php echo $registros['nombre']." - ". $registros['municipio']." "  ?><img src="docs/images/escarapela.png" width="28"></div>                          
                        </div>
                      </div>
                    </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <?php                  
             }
            else {
            ?>
            <div class="widget_summary"  style="margin-top: 10px;">                    
              <div class="col w_center w_55">
                <div class="progress" > 
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; background-color: #D3D3D3;">
                    <div class="a16 text-start fw-bold ml-2 text-capitalize"  style="color: #132d1a;" onclick="escoger(<?php echo $registros['id'] ?>)"> <?php echo $registros['nombre']." - ". $registros['municipio']." "  ?> </div>                          
                  </div>
                </div>
              </div>                    
              <div class="clearfix"></div>
            </div>
            <?php 
            }
            }
            ?>
            </div>
          </div>

              <!-- Grafico 2 -->
              <div id="mostrar_mensaje"></div>
              <?php                
                 if(isset($_SESSION['mensaje'])){ unset($_SESSION['mensaje']);
                 ?>             
             
              <p class="a2 fw-bold"><img src="docs/images/2.png" width="7"><span style="color: #132d1a;">  <?php echo  $_SESSION['nombre'] ?></span></p>      
              <div class="a30">  <span class="a29 fw-bold" style="color:#0CA438"><?php echo  $_SESSION['municipio'] ?></span> </div>
              <div class="a27">
              <div class="card a3 text-uppercase">
               
                <div class="card-body" style="background-color: #D3D3D3; border-bottom-left-radius: 35px;" >
                  
                  <div class="card-cuadro"  class="text-start">                     
                      <div class="row a4">                        
                          <img src="docs/images/botella.png" class="botella">                        
                           <p class="fw-bold text-white fs-2 a7"> <?php echo  $_SESSION['cantidad'] ?></p>                       
                           <p class="text-white a9">Kilos</p>
                        
                        <div class="d-flex text-dark">
                          <div class="vr a10"></div>
                        </div>   
                        <div>
                           <img src="docs/images/escarapela.png" class="a12">
                        </div>                        
                          <p class="fw-bold text-white a13"> <?php echo  $_SESSION['grado'] ?> </p>                       
                          <p class="text-white a14">Mayor recolector</p>
                                             
                      </div>
                  </div>
                  <?php 
                  $resultados = mysqli_query($conexion,"select id, grado, sum(cantidad) as cant, nombre, municipio  from recolecion where id = $_SESSION[id]   group by grado order by cant desc");
                  $colegio2 = 0;
                  while ($consulta = mysqli_fetch_array($resultados))
                   { 
                       if ($colegio2 == 0) {
                           $colegio2 = 1;                          
                        
                  ?> 
                          <div class="widget_summary a15"  style="margin-top: 20px;">                    
                             <div class="col-13 w_center w_55">
                               <div class="progress"> 
                                 <div class="progress-bar bg-white" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  style=" width:90%;">
                                   <div class="fw-bold text-capitalize bg-white a21 text-start" style="color: #132d1a;"><?php echo  $consulta['grado']; ?> </div>                          
                                     <div class="fw-bold text-capitalize a31 text-start" style="color: #132d1a;"><?php echo  " | ".  $consulta['cant']; ?></div> 
                                       <img src="docs/images/escarapela.png" class="a20">
                                     </div>
                                   </div>
                                 </div>                    
                               <div class="clearfix"></div>
                           </div>
                  <?php 
                  }                
                  else {
                  ?>
                  <div class="widget_summary a15"  style="margin-top: 1px;">                    
                    <div class="col-13 w_center w_55">
                      <div class="progress"> 
                        <div class="progress-bar bg-white" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  style=" width:90%;">
                          <div class="fw-bold text-capitalize bg-white a21 text-start" style="color: #132d1a;"><?php echo  $consulta['grado'] ?></div>                                                 
                          <div class="fw-bold text-capitalize a31 text-start" style="color: #132d1a;"><?php echo  " | ".  $consulta['cant']; ?></div>                                                 
                        </div>
                      </div>
                    </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  }
                  }
                  ?>                 
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <?php
          }
          else {
          ?>
           <!-- Grafico 2 -->
            <!-- Grafico 3 -->
         
              <?php                           
              $r = mysqli_query($conexion,"select id, grado, sum(cantidad) as cant, nombre, municipio  from recolecion group by grado order by cant desc");    
              $colegio3 = 0;
              while($c = mysqli_fetch_array($r))
              {             
                if ($colegio3 == 0) {
                $colegio3 = 1;        
              ?>
              <p class="a2 fw-bold"><img src="docs/images/2.png" width="7"><span style="color: #132d1a;">  <?php echo  $c['nombre'] ?></span></p>      
              <div class="a30">  <span class="a29 fw-bold" style="color:#0CA438"><?php echo  $c['municipio'] ?></span> </div>
              <div class="a27">
              <div class="card a3 text-uppercase">
               
                <div class="card-body" style="background-color: #D3D3D3; border-bottom-left-radius: 35px;" >
                  
                  <div class="card-cuadro"  class="text-start">                     
                      <div class="row a4">                        
                          <img src="docs/images/botella.png" class="botella">                        
                           <p class="fw-bold text-white fs-2 a7"> <?php echo  $c['cant'] ?></p>                       
                           <p class="text-white a9">Kilos</p>
                        
                        <div class="d-flex text-dark">
                          <div class="vr a10"></div>
                        </div>   
                        <div>
                           <img src="docs/images/escarapela.png" class="a12">
                        </div>                        
                          <p class="fw-bold text-white a13"> <?php echo  $c['grado'] ?> </p>                       
                          <p class="text-white a14">Mayor recolector</p>
                                             
                      </div>
                  </div>                 
                          <div class="widget_summary a15"  style="margin-top: 20px;">                    
                             <div class="col-13 w_center w_55">
                               <div class="progress"> 
                                 <div class="progress-bar bg-white" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  style=" width:90%;">
                                   <div class="fw-bold text-capitalize bg-white a21 text-start" style="color: #132d1a;"><?php echo  $c['grado']; ?> </div>                          
                                     <div class="fw-bold text-capitalize a31 text-start" style="color: #132d1a;"><?php echo  " | ".  $c['cant']; ?></div> 
                                       <img src="docs/images/escarapela.png" class="a20">
                                     </div>
                                   </div>
                                 </div>                    
                               <div class="clearfix"></div>
                           </div>
                  <?php 
                  }                
                  else {
                  ?>
                  <div class="widget_summary a15"  style="margin-top: 1px;">                    
                    <div class="col-13 w_center w_55">
                      <div class="progress"> 
                        <div class="progress-bar bg-white" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  style=" width:90%;">
                          <div class="fw-bold text-capitalize bg-white a21 text-start" style="color: #132d1a;"><?php echo  $c['grado'] ?></div>                                                 
                          <div class="fw-bold text-capitalize a31 text-start" style="color: #132d1a;"><?php echo  " | ".  $c['cant']; ?></div>                                                 
                        </div>
                      </div>
                    </div>                    
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  }
                  }
                  ?>                 
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <?php
          }
          ?>
           <!-- Grafico 3 -->
         

        </div>        
      </div>
    </div>

         <!-- /page content -->

         <!-- footer content -->
         <footer>
          
         </footer>
         <!-- /footer content -->
     
    

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

     <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
  </body>
</html>
<!-- Funciones De JS-->
<script type="text/javascript">  

    
    <!-- ----------------- REGISTRAR--------------------------------->  
      function escoger(consultar)
       {  location.reload();
        consulta = consultar;
          var parametros = 
          {           
            "con" : consulta,
            "accion" : "4"
          };
    
          $.ajax({
            data: parametros,
            url: 'consulta_colegio.php',
            type: 'POST',
            
            beforesend: function()
            {
              $('#mostrar_mensaje').html("Mensaje antes de Enviar");
            },
    
            success: function(mensaje)
            {
              $('#mostrar_mensaje').html(mensaje);
            }
          });
          return false;
         
        }     
</script>
