<?php if(Session()->get("access")->allow_add == 1) { ?>
<a title="add new data" class="btn btn-sm btn-success" href="<?=current_url()."/add"?>"><i class="fa fa-plus-circle"></i>
    <?=$options["btnname"]?>
</a>
<?php } ?>