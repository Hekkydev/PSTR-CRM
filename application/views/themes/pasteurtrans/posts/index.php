<div class="col-sm-8 blog-base">
<div class="col-lg-12 no-padding">
<?php if(!empty($posts)):?>
  <?php foreach($posts as $post):?>
            <article class="col-sm-12 no-padding blog-block">
               <img src="<?php echo BASE_URI.$post['featured_image']?>" alt="<?php echo $post['title'];?>"/>
                <div class="blog-content">
                    <div class="icon pull-left">
                        <i class="fa fa-thumb-tack"></i>
                    </div>
                    <div class="blog-info">
                        <ul class="meta">
                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Written by">
                                <i class="fa fa-user"></i>Super User
                            </li>
                            <li>
                                <a data-toggle="tooltip" data-placement="top" title="" href="blog-right-sidebar.html#" data-original-title="Article Category">
                                    <i class="fa fa-folder-open-o"></i>Capital</a>
                            </li>
                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Published date">
                                <i class="fa fa-calendar-o"></i>02 February 2016
                            </li>
                        </ul>
                        <h2><a href="<?php echo site_url('read/'.$post['slug'])?>"><?php echo $post['title']?></a></h2>
                    </div>
                     <?php echo word_limiter(strip_tags($post['body'],'<p><br>'),40)?><hr>
                      <a href="<?php echo site_url('read/'.$post['slug'])?>" class="btn btn-default readmore">Read more...</a>
                </div>
            </article>
<?php endforeach;?>
<div class="pagination-wrapper">
                             <?php echo $pagination;?>
</div>

 
<?php endif;?>

</div>
</div>