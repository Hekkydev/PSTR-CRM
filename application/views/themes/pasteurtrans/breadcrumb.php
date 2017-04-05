
<!--Breadcrumb-->
<section id="breadcrumb" class="space">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 breadcrumb-block">
                <h2><?php echo strtoupper($page_title); ?></h2>
            </div>
            <div class="col-sm-6 breadcrumb-block text-right">
                <ol class="breadcrumb">
                    <li><span>Berada di Halaman:</span><a href="<?php echo site_url()?>">Home</a></li>
                    <li class="active"><?php echo $page_title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
