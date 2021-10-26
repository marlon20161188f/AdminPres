<div class="content-wrapper"style="min-height: 1170.12px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilidades</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Utilidades</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Monto ganado por préstamo</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr style="background-color:#001f3f;color:#ffffff;">
                      <th>Código de Préstamo</th>
                      <th>Datos del Cliente</th>
                      <th>Monto Prestado</th>
                      <th>Intereses y Moras</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>B001-0002</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> MERA SEDANO, ERIKA MILAGROS</strong><br> <strong>DNI:</strong> 47012506<br> <strong>RUC:</strong> 4701250<br> </td>
                      <td>15000</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> Interes utilitario: 5%</strong><br> <strong>Mora:</strong> 12/08/2021 - S/ 10<br> <strong>Mora:</strong> 02/10/2021 - S/ 10<br> </td>
                    </tr>
                    <tr>
                      <td>B001-0003</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> GOMEZ ALFONSO, JUAN BRYAN</strong><br> <strong>DNI:</strong> 47012123<br> <strong>RUC:</strong> 47012123<br> </td>
                      <td>10000</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> Interes utilitario: 2.5%</strong><br> <strong>Mora:</strong> 12/07/2021 - S/ 10<br> <strong>Mora:</strong> 22/19/2021 - S/ 20<br> <strong>Mora:</strong> 21/10/2021 - S/ 15<br></td>
                    </tr>
                    <tr>
                      <td>B001-0091</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> DOMINGUEZ FERNANDEZ, YOVANA OLGA</strong><br> <strong>DNI:</strong> 47012500<br> <strong>RUC:</strong> 47012500<br> </td>
                      <td>11000</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> Interes utilitario: 3%</strong><br> <strong>Mora:</strong> 02/08/2021 - S/ 10<br> <strong>Mora:</strong> 15/19/2021 - S/ 15<br> </td>
                    </tr>
                    <tr>
                      <td>B001-0006</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> COAQUIRA CHARAGUA, ROSA MARIA</strong><br> <strong>DNI:</strong> 45420911<br> <strong>RUC:</strong> 45420911<br> </td>
                      <td>35000</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> Interes utilitario: 4%</strong><br> <strong>Mora:</strong> 10/07/2021 - S/ 15<br> <strong>Mora:</strong> 02/08/2021 - S/ 10<br><strong>Mora:</strong> 12/09/2021 - S/ 20<br><strong>Mora:</strong> 02/10/2021 - S/ 25<br> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    </section>  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Préstamos y Ganancias</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;" width="604" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
</div>
