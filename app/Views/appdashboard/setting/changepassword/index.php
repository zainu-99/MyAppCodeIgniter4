<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header"><strong></strong></div>
<?php if(Session()->has('success'))
{?>
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong><?=Session()->get('success')?></strong>
      </div>
<?php
}?>
<?php if(Session()->has('failed'))
{?>
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong><?=Session()->get('failed')?></strong>
      </div>
<?php
}?>
<div class="card-body">
           
           <form role="form" method="POST" action="<?=current_url()?>/edit/<?=Session()->get('id')?>">
             <?= csrf_field() ?>  
             <div class="form-group" style="display:">
                 <label>Current Password :</label>
                 <input required="" type="text" class="form-control" name="current_password" value="" placeholder=""/>
             </div>
             <div class="form-group" style="display:">
                 <label>New Password :</label>
                 <input required="" type="text" class="form-control" name="new_password" value="" placeholder=""/>
             </div>
             <div class="form-group" style="display:">
                 <label>Confirm Passowrd :</label>
                 <input required="" type="text" class="form-control" name="confirm_password" value="" placeholder=""/>
             </div>
             <div class="box-footer">
                 <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"/>
             </div>
         </form>
   </div>
<?= $this->endSection() ?>
