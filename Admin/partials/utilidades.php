<style>
  #menu * { list-style:none;}
  #menu li{ line-height:180%;}
  #menu li a{color:#222; text-decoration:none;}
  #menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
  #menu input[name="list"] {
    position: absolute;
    left: -1000em;
    }
  #menu label:before{ content:"\025b8"; margin-right:4px;}
  #menu input:checked ~ label:before{ content:"\025be";}
  #menu .interior{display: none;}
  #menu input:checked ~ ul{display:block;}

</style>
<div class="content-wrapper"style="min-height: 1170.12px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilidades</h1>
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
                      <th>Código de préstamo</th>
                      <th>Datos del cliente</th>
                      <th>Monto desembolsado</th>
                      <th>Interés </th>
                      <th>Monto cobrado</th>
                      <th>Utilidades</th>
                      <th>Moras</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>B001-0002</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> MERA SEDANO, ERIKA MILAGROS</strong><br> <strong>DNI:</strong> 47012506<br> </td>
                      <td>S/ 15000</td>
                      <td>5%</td>
                      <td>S/ 15750</td>
                      <td>S/ 750</td>
                      <td style="font-size: 11px;">
                        <ul id="menu">
                        <li><input type="checkbox" name="list" id="nivel1-1"><label for="nivel1-1"><strong><i class="ti-wheelchair"></i> Moras: </strong>2<br></label>
                        <ul class="interior">
                              <li><input name="list"   ><label for="nivel2-1"> <strong> </strong> 12/08/2021 - S/ 10<br></label>
                              </li>
                              <li><input name="list"   ><label   ><strong> </strong> 02/10/2021 - S/ 10<br></label>
                              </li>
                        </ul>
                        </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td>B001-0003</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> GOMEZ ALFONSO, JUAN BRYAN</strong><br> <strong>DNI:</strong> 47012123<br> </td>
                      <td>S/ 10000</td>
                      <td>25%</td>
                      <td>S/ 12500</td>
                      <td>S/ 2500</td>
                      <td style="font-size: 11px;">
                        <ul id="menu">
                        <li><input type="checkbox" name="list" id="2nivel1-1"><label for="2nivel1-1"><strong><i class="ti-wheelchair"></i> Moras: </strong>3<br></label>
                        <ul class="interior">
                              <li><input name="list" ><label > <strong> </strong> 12/07/2021 - S/ 10<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 22/19/2021 - S/ 20<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 21/10/2021 - S/ 15<br></label>
                              </li>
                        </ul>
                        </li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td>B001-0091</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> DOMINGUEZ FERNANDEZ, YOVANA OLGA</strong><br> <strong>RUC:</strong> 47012500<br> </td>
                      <td>S/ 11000</td>
                      <td>10%</td>
                      <td>S/ 12100</td>
                      <td>S/ 1100</td>
                      <td style="font-size: 11px;">
                        <ul id="menu">
                        <li><input type="checkbox" name="list" id="3nivel1-1"><label for="3nivel1-1"><strong><i class="ti-wheelchair"></i> Moras: </strong>2<br></label>
                        <ul class="interior">
                              <li><input name="list" ><label > <strong> </strong> 21/08/2021 - S/ 10<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 02/09/2021 - S/ 15<br></label>
                              </li>
                        </ul>
                        </li>
                        </ul>
                      </td>                   
                     </tr>
                    <tr>
                      <td>B001-0006</td>
                      <td style="font-size: 11px;"><strong><i class="ti-wheelchair"></i> COAQUIRA CHARAGUA, ROSA MARIA</strong><br>  <strong>RUC:</strong> 45420911<br> </td>
                      <td>S/ 35000</td>
                      <td>10%</td>
                      <td>S/ 38500</td>
                      <td>S/ 3500</td>
                      <td style="font-size: 11px;">
                        <ul id="menu">
                        <li><input type="checkbox" name="list" id="4nivel1-1"><label for="4nivel1-1"><strong><i class="ti-wheelchair"></i> Moras: </strong>4<br></label>
                        <ul class="interior">
                              <li><input name="list" ><label > <strong> </strong> 10/07/2021 - S/ 15<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 02/08/2021 - S/ 20<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 01/10/2021 - S/ 10<br></label>
                              </li>
                              <li><input name="list" ><label ><strong> </strong> 29/06/2021 - S/ 25<br></label>
                              </li>
                        </ul>
                        </li>
                        </ul>
                      </td>                    
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
