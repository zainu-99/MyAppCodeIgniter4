<?php if(Session()->get("access")->allow_edit == 1) { ?>
<a title="edit data" class="btn btn-xs btn-primary" href="<?=current_url()?>/edit/<?=$options['id']?>"><i class="fa fa-edit"></i><?=$options['btnname']?></a>
<?php } ?>