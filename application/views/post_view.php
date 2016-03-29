    <header class="intro-header" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $post['title'] ?></h1>
                        <span class="meta">Escrito por<a href="#"><?php echo $post['user'] ?></a> el <?php echo $post['date'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2><?php echo $post['content'] ?></h2>
                </div>
            </div>
        </div>
    </article>

    <hr>
