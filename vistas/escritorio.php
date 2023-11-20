<?php
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
} else {
  require 'header.php';

  if ($_SESSION['escritorio'] == 1) {

    require_once "../modelos/Consultas.php";
    $consulta = new Consultas();
    $rsptac = $consulta->totalcomprahoy();
    $regc = $rsptac->fetch_object();
    $totalc = $regc->total_compra;

    $rsptav = $consulta->totalventahoy();
    $regv = $rsptav->fetch_object();
    $totalv = $regv->total_venta;
?>

    <div class="content-wrapper" style="background-image: url(https://th.bing.com/th/id/R.6a19f021d9f72b40aa31f5ac8e15d4ea?rik=Y%2bopOhOoA1ViPQ&riu=http%3a%2f%2f1.bp.blogspot.com%2f_SufSjRm3MnA%2fTPuHNn4maEI%2fAAAAAAAAAJo%2fhLitnUCCNp0%2fs1600%2fPA5-2.jpg&ehk=dFrucGSiGcwZLNmYYUzOagF%2bshS9%2bDyYAS%2bMwGro010%3d&risl=&pid=ImgRaw&r=0);">
      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title">Escritorio</h1>
                <div class="box-tools pull-right">

                </div>
              </div>
              <!--box-header-->
              <!--centro-->
              <div class="panel-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h4 style="font-size: 17px;">
                        <strong>S/. <?php echo $totalc; ?> </strong>
                      </h4>
                      <p>Compras</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h4 style="font-size: 17px;">
                        <strong>S/. <?php echo $totalv; ?> </strong>
                      </h4>
                      <p>Ventas</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="venta.php" class="small-box-footer">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <!--fin centro-->
            </div>
          </div>
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
<?php
  } else {
    require 'noacceso.php';
  }

  require 'footer.php';
}
ob_end_flush();
?>