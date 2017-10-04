        <div class="col-md-10 col-md-offset-1">

          <section class="ingreso_datos hide" id="ingreso_datos">
                <h3>ingresa tus datos</h3>
              <form id="form_datos" class="form-horizontal">
                <div class="box_edad separador">
                  <p>¿eres mayor de edad?</p>

                  <label class="radio-inline">
                    <input type="radio" name="mayor" id="inlineRadio1" value="1"> sí
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="mayor" id="inlineRadio2" value=""> no
                  </label>

                </div> <!-- box edad -->
                <div class="separador">
                  <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                          <label for="nombre" class="col-xs-12 col-md-4">nombre completo</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required >
                                <input type="hidden" name="codigo2" id="codigo2">
                                <input type="hidden" name="hora2" id="hora2">
                                <input type="hidden" id="sueno" name="sueno">
                            </div>
                        </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group border_top">
                          <label for="fecha" class="col-xs-12 col-md-4">fecha de nacimiento</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="fecha" name="fn" placeholder="" required >
                            </div>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="separador">
                  <div class="col-sm-12 col-md-6">
                         <div class="form-group">
                          <label for="rut" class="col-xs-12 col-md-4">rut</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="rut" name="rut" placeholder=""required>
                            </div>
                        </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                         <div class="form-group">
                          <label for="telefono" class="col-xs-12 col-md-4">Teléfono</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="telefono" name="fono" placeholder="" required>
                            </div>
                        </div>
                  </div>
                <div class="clearfix"></div></div>

                <div class="separador">
                  <div class="col-sm-12 col-md-6">
                         <div class="form-group">
                          <label for="email" class="col-xs-12 col-md-4">Mail</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                            </div>
                        </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                         <div class="form-group border_bottom">
                          <label for="ciudad" class="col-xs-12 col-md-4">Región</label>
                            <div class="col-md-8">
                              <select class="form-control" name="region" id="region" required>
                                  <option value="">Seleccione Región</option>
                                <?php
                                  $resultado = $db->rawQuery('select * from region');
                                if($resultado){
                                  foreach ($resultado as $r) {
                                    $region_id   = $r["region_id"];
                                    $region_nombre  = $r["region_nombre"];
                                ?>
                                  <option value="<?php echo $region_id; ?>"><?php echo $region_nombre; ?></option>
                                  <?php
                                      }
                                    }
                                  ?>
                                </select>
                            </div>
                        </div>
                  </div>

                <div class="clearfix"></div>
              </div><!-- separador -->
                <div class="clearfix"></div>
              <button type="submit" class="btn btn-default btn_amarillo center-block" id="btnEnviar">enviar</button>
            </form>
          </section>
        </div>
