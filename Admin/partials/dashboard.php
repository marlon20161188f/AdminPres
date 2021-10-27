<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
<div class="content-wrapper"style="min-height: 1170.12px;">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-10 text-center p-0 mt-3 mb-2">
                <div class="card px-4 pt-4 pb-0 mt-1 mb-1">
                    <h2 id="heading">Registrar Nuevo Préstamo</h2>
                    <p>Ingrese los datos del prestamo a realizar</p>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>DNI, RUC</strong></li>
                            <li id="personal"><strong>Configuración</strong></li>
                            <li id="payment"><strong>Cronograma</strong></li>
                            <li id="confirm"><strong>Visualización</strong></li>
                            <li id="viuw"><strong>Finalizar</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Documento de Identidad:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 1 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="fieldlabels">Tipo de Documento:</label>
                                        <select class="form-control"type="text" name="uname" placeholder="DNI"style="margin:5px;"> 
                                            <option>DNI</option>
                                            <OPTIOn>RUC</OPTIOn>
                                        </select> 
                                    </div>
                                    <div class="col-6">
                                        <label class="fieldlabels">Numero de Documento:</label>
                                        <input type="text"placeholder="73208361" /> 
                                    </div>
                                <!-- <div class="row">
                                    <div class="col-6">
                                        <label class="fieldlabels">Email: *</label> 
                                        <input type="email" name="email" placeholder="Email Id" /> 
                                        <label class="fieldlabels">Username: *</label>
                                        <input type="text" name="uname" placeholder="UserName" />
                                    </div>
                                    <div class="col-6">
                                        <label class="fieldlabels">Password: *</label> 
                                        <input type="password" name="pwd" placeholder="Password" /> 
                                        <label class="fieldlabels">Confirm Password: *</label> 
                                        <input type="password" name="cpwd" placeholder="Confirm Password" />
                                    </div> -->
                                </div>    
                            </div> 
                            <!-- validar -->
                            <input type="button" name="next" class="next action-button" value="Siguiente" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Parámetros del Préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="fieldlabels">Tipo de Préstamo: </label> 
                                        <select class="form-control"type="email" name="email" placeholder="Mensual"style="margin:5px;margin-bottom: 1.6rem;" >
                                            <option>Diario</option>
                                            <option>Semanal</option>
                                            <option>Mensual</option>
                                        </select> 
                                        <label class="fieldlabels">Número de cuotas: </label>
                                        <input type="number"  placeholder="10" />
                                        <label class="fieldlabels">Fecha de Desembolso: </label> 
                                        <input type="date" name="pwd" placeholder="24/10/2021" /> 
                                    </div>
                                    <div class="col-6">
                                        <label class="fieldlabels">Tasa de Interés %: </label> 
                                        <input type="number" name="pwd" placeholder="5" /> 
                                        <label class="fieldlabels">Mora por día de Retraso S/ : </label> 
                                        <input type="number" name="cpwd" placeholder="10" />
                                        <label class="fieldlabels">Monto Prestado S/ : </label> 
                                        <input type="number" name="pwd" placeholder="12000" /> 
                                    </div>
                                </div>
                            </div>
                             <input type="button" name="next" class="next action-button" value="Siguiente" />
                             <input type="button" name="previous" class="previous action-button-previous" value="Atrás" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Cronograma de cobros:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 3 - 4</h2>
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                    <?php include('layout/tabla_de_prestamos.php'); ?>
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="previous" class="previous action-button-previous" value="Atrás" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Datos del Préstamo:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 4 - 4</h2>
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                    <?php include('layout/tabla_visualisar.php'); ?>
                                    </div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Validar" /> <input type="button" name="Atrás" class="previous action-button-previous" value="Atrás" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Fin:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps"></h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>ÉXITO !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-1"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Su Préstamo ha sido registrado con éxito</h5>
                                    </div>
                                </div>
                            </div> <a href="<?php echo $url_site; ?>index.php" type="button" name="next" class="next action-button" value="Nuevo">Nuevo </a> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

