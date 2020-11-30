@extends('layouts.dashboard.template')

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
                            <div class="form-group">
                                <label>Role :</label>
                                <div class="">
                                <select class=""  name="id_role" style="width: 100%;height:39px">
                                <?php
                                foreach($roles as $key=>$item)
                                {
                                    echo '<option value="'.$item->id.'">'.$item->name.'</option>';
                                }
                                ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Menu Text :</label>
                                <input  class="form-control" name="menu_text" value="" placeholder=""/>
                            </div>          
                            <div class="form-group">
                                <label>Parent :</label>
                                <div class="">
                                <select class=""  name="id_parent" style="width: 100%;height:39px">
                                <option value="-">No Parent</option>
                                <?php
                                foreach($parents as $key=>$item)
                                {
                                    echo '<option value="'.$item->id.'">'.$item->menu_text.'</option>';
                                }
                                ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Icon :</label>
                                <input  class="form-control" name="icon" value='<i class="nav-icon fas fa-circle"></i>' placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Order Sort :</label>
                                <input type="number" min="0"  class="form-control" name="order_sort" value="0" placeholder=""/>
                            </div>
                            <div class="box-footer">
                                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
                            </div>
                        </form>
</div>
<?= $this->endSection() ?>
