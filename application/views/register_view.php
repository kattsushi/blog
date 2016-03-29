    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Registro</p>
                <form  method="post" action="<?php echo base_url('login/register')?>">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="name" required>
                            <p class="help-block text-danger"><?php echo form_error('name'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname" required>
                            <p class="help-block text-danger"><?php echo form_error('lastname'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" id="user" name="user" required>
                            <p class="help-block text-danger" id="user_error"><?php echo form_error('user'); ?></p>
                            <p class="help-block text-success" id="user_success"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                            <p class="help-block text-danger"><?php echo form_error('password'); ?></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default" id="submit">Resgistrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#user").focusout(function(){
                $.ajax({
                  method: "POST",
                  url: "<?php echo base_url()?>login/validate_user/"+$(this).val(),
                })
                  .done(function( msg ) {
                    if(msg){
                        $('#user_error').empty();
                        $('#user_success').empty();
                        $('#user_success').append('Usuario no disponible');
                        $('#submit').attr('disabled','disabled');
                    }else{
                        $('#user_success').empty();
                        $('#user_error').empty();
                        $('#user_error').append('Usuario disponible');
                        $('#submit').removeAttr('disabled');
                    }
                  });
            });
        });
    </script>
