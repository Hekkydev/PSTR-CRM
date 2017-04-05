<!DOCTYPE html>

<html lang="en">

<head>
    <title><?php echo $title_site; ?></title>
    <?php //echo $meta_script; ?>
    <?php include 'style.php' //echo $style;  ?>
</head>

<body>
    <div class="body-innerwrapper inner">
        <?php include 'header.php'; ?>
        <?php include 'top_menu.php'; ?>
        <?php include 'breadcrumb.php'; ?>
              <!--post-->
                <section id="blog" class="space-100 single-blog">
                    <div class="container">
                        <div class="row">
                            <?php echo $content; ?>
                            <!-- ASIDE -->
                            <?php include 'sidebar.php'; ?>
                            <!-- ASIDE -->
                        </div>
                    </div>
                </section>
              <!-- post -->
        <?php include 'footer.php'; ?>
        <?php include 'sidemenus.php'; ?>
    </div>
    <?php include 'script.php'; ?>
</body>

</html>
