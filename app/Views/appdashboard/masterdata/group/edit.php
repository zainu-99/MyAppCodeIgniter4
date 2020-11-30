<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header"><strong>ADD DATA</strong></div>
<?php if(Session()->has('msg'))
{?>
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong><?=Session()->get('msg')?></strong>
      </div>
<?php
}?>
<div class="card-body">
        <form role="form" method="POST" action="">
            <?= csrf_field() ?>
            <div class="form-group" style="display:">
                <label>Name :</label>
                <input required="" class="form-control" name="name" value="<?=$item->name?>" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Note :</label>
                <input required="" class="form-control" name="note" value="<?=$item->note?>" placeholder=""/>
            </div>
            <div class="box-footer">
                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
            </div>
        </form>
</div>
<?= $this->endSection() ?>
