<div class="bg-gradient-theme text-white mb-3">
    <div class="container">
        <div class="row align-items-center m-0 py-1">
            <div class="col-5 col-sm-8 px-0">
                <?php echo velocity_date(); ?>
            </div>
            <div class="col-7 col-sm-4 text-md-end px-0">
            <?php $sq = isset($_GET['s'])?$_GET['s']:''; ?>
                <form method="get" name="searchform" action="<?php echo get_home_url();?>">
                    <input type="hidden" name="post_type" value="post" />
                    <div class="row">
                        <div class="col-9 col-md-10 pe-0">
                            <input type="text" name="s" class="form-control form-control-sm" placeholder="Search" value="<?php echo $sq;?>" required />
                        </div>
                        <div class="col-3 col-md-2 ps-1">
                            <button type="submit" class="h-100 w-100 btn btn-primary btn-sm bg-color-theme border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
