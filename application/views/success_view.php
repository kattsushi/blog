    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <p><h1><b><?php echo $text; ?></b></h1></p>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function redireccionarPagina() {
            window.location = "<?php echo base_url("$return")?>";
        }
        setTimeout("redireccionarPagina()", 1000);
    </script>
