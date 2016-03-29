    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Cambiar Contraseña</p>
                <form  method="post" action="change_password">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña Actual</label>
                            <input type="text" class="form-control" placeholder="Contraseña Actual" name="old_password" required>
                            <p class="help-block text-danger"><?php echo form_error('old_password'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña Nueva</label>
                            <input type="text" class="form-control" placeholder="Contraseña Nueva" name="new_password" required>
                            <p class="help-block text-danger"><?php echo form_error('new_password'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirmar Contraseña Nueva</label>
                            <input type="text" class="form-control" placeholder="Confirmar Contraseña Nueva" id="user" name="new_password_confirm" required>
                            <p class="help-block text-danger" id="user_error"><?php echo form_error('new_password_confirm'); ?></p>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default" id="submit">Cambiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
