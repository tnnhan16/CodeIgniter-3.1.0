<section class="au-breadcrumb">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="/admin"><i class="fa fa-home" aria-hidden="true"></i></a>
                                </li>
                                <?php if(!empty($breadcrumb)): ?>
                                <?php foreach($breadcrumb as $key => $item) :?>
                                <?php if($key > 0): ?>
                                <li class="list-inline-item seprate">
                                    <span><i class="fa fa-chevron-right"></i></span>
                                </li>
                                <li class="list-inline-item">
                                    <?php if(count($breadcrumb) > $key + 1 ): ?>
                                    <a href="<?php echo '/' . $item['key'] ?>">
                                        <?php echo $item['value']; ?>
                                    </a>
                                    <?php else: ?>
                                    <?php echo $item['value']; ?>
                                    <?php endif ?>
                                </li>
                                <?php endif ?>
                                <?php endforeach ?>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>