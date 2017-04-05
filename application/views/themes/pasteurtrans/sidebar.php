<aside class="col-sm-4 sidebar">
    <!-- <div class="widget about">
        <img src="images/shutterstock_9833917.jpg" alt="shutterstock 9833917">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet, nec in adipiscing purus luctus, urna pellentesque fringilla vel, non sed arcu integer, mauris ullamcorper ante ut non torquent.</p>
    </div> -->
    <div class="widget category">
        <h3 class="sp-module-title">KATEGORI</h3>
        <ul class="categories-module">
       
           <?php if(!empty($this->general->listCategories())):?>
                        <?php foreach($this->general->listCategories() as $category):?>
                          <li><a href="<?php echo site_url('category/'.$category['slug'])?>"><?php echo $category['name']?></a></li>
                        <?php endforeach;?>
            <?php endif;?>
        </ul>
    </div>
    <div class="widget  tag-blog">
        <h3 class="sp-module-title">TAG</h3>
        <div class="tag-blog">
            <ul>
                 <?php if(!empty($this->general->listTags())):?>
                    <?php foreach($this->general->listTags() as $tag):?>
                       <li> <a  href="<?php echo site_url('tag/'.$tag['slug'])?>"><?php echo ucwords($tag['name'])?></a> </li>
                    <?php endforeach;?>
                  <?php endif;?>
            </ul>
        </div>
    </div>

    <div class="widget post">
        <h3 class="sp-module-title">BERITA LAINNYA</h3>

        <?php if(!empty($this->general->listRecentPosts(6))):?>
            <?php foreach ($this->general->listRecentPosts(6) as $post):?>              
                <div class="latestnews">
                    <div class="recent-post">
                        <a href="<?php echo site_url('read/'.$post['slug']) ?>"><?php echo $post['title'] ?></a>
                        <span class="icon-calendar"></span><?php echo $post['created']?>
                    </div>
                </div>
            <?php endforeach;?>
            <?php endif;?>

        
    </div>
</aside>
