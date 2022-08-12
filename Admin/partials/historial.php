<div class="content-wrapper"style="min-height: 1170.12px;">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historial</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
          
           
           
                <!-- /.card -->
                <!-- Horizontal Form -->
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Historial de Préstamos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Cliente : </label>
                            <div class="col-sm-5">
                            <input  type="text" class="form-control" id="caja_busqueda" placeholder="Cliente">
                             <!-- <input hidden type="text" class="form-control" id="caja_busqueda_vacio" placeholder="Cliente" value="mera">  -->
                            </div>
                            <div class="col-sm-4 card-footer"style="background-color: rgb(255 255 255);padding:0rem;">
                                <button hidden type="submit" class="btn btn-info">Buscar otro cliente</button>
                             </div>
                            <div class="col-sm-2 card-footer"style="background-color: rgb(255 255 255);padding:0rem;">
                                <button type="submit" class="btn btn-info">Buscar otro cliente</button>
                             </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                 
                    <!-- /.card-footer -->
                </form>
                <div id="datos">
                <table class="table table-hover table-xs" style="background-color:#8f8f8f21;" width="100%">
                <thead><tr class="first" style="background-color:#001f3f;color:#ffffff;">
                <th class="th1 text-center">Cliente</th><th class="th1 text-center">Código de Prestamo</th>
                <th class="th1 text-center">Fecha de desembolso</th><th class="th1 text-center">Mora por día de retraso</th>
                <th class="th1 text-center">Monto prestado</th><th class="th1 text-center">Por cobrar</th><th class='th1 text-center'></th> 
                </tr></thead><tbody class="text-center" align="center">
                  
                </tr></tbody></table>

                </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
</div>