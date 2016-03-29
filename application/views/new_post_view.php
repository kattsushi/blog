    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Crear Entrada</p>
                <form  id="new_post" method="post" action="<?php echo base_url('post/new_post') ?>">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Titulo</label>
                            <input type="text" class="form-control" placeholder="Titulo de la Entrada" name="title" value="" required>
                            <p class="help-block text-danger"><?php echo form_error('title'); ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <input type="hidden" class="form-control" name="content" id="content" required>
                        </div>
                    </div>
                    <div id="summernote"></div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default" id="post" >Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Escriba el contenido',
                toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['fullscreen', ['fullscreen']],
              ]
            });

            $("#post").click(function(e){
                e.preventDefault();
                if ($('#summernote').summernote('isEmpty')) {
                    alert('El Título o el contenido está vacío');
                }else {
                    $('#content').val($('#summernote').summernote('code'));
                    $('#new_post').submit();
                }
            });
        });
    </script>
