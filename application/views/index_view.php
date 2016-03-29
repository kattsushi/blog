    <header class="intro-header" style="background-image: url('<?php echo base_url(); ?>assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Blogline</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php if(count($entries)>0): ?>
                    <?php foreach ($entries as $row):?>
                        <div class="post-preview">
                            <a href="<?php echo base_url('post/get').'/'.$row['id'] ?>">
                                <h2 class="post-title">
                                    <?php echo $row['title'];?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <!--<?php echo substr($row['content'],0,50).'...';?>-->
                                    <?php echo strip_tags($row['content']);?>
                                </h3>
                            </a>
                            <?php if($this->session->userdata('logged')): ?>
                                <p class="post-meta">Escrito por <i><?php echo $row['user']?></i> el <?php echo $row['date'] ?></p>
                            <?php endif; ?>
                        </div>
                        <hr>
                    <?php endforeach;?>
                <?php else: ?>
                    <h2 class="post-title">Aún no existen entradas en el blog.</h2>
                    <h3 class="post-subtitle">Sé el primero en escribir algo interesante.</h3>
                <?php endif ?>
                <!-- Pager -->
                <?php if($prev>=0):?>
                    <ul class="pager prev">
                        <li>
                            <a href="<?php echo base_url('index/entries').'/'.$prev?>">&larr; ENTRADAS MÁS RECIENTES</a>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php if($next>=0):?>
                    <ul class="pager next">
                        <li>
                            <a href="<?php echo base_url('index/entries').'/'.$next?>"> ENTRADAS MÁS ANTIGUAS &rarr;</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <hr>
