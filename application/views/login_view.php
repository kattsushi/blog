    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p><b>Iniciar Sesión</b></p>
                <form  method="post" action="login/enter">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" name="user" value="<?php echo set_value('username'); ?>" required size="15">
                            <p class="help-block text-danger"><?php echo form_error('user'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required size="15">
                            <p class="help-block text-danger"><?php echo form_error('password'); ?></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
