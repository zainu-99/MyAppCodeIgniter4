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
                                foreach($roles as $key=>$role)
                                {
                                    echo '<option '. (($role->id == $item->id_role) ? ' selected ':' ') .' value="'.$role->id.'">'.$role->name.'</option>';
                                }
                                ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Menu Text :</label>
                                <input  class="form-control" name="menu_text" value="<?=$item->menu_text?>" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Parent :</label>
                                <select class=""  name="id_parent" style="width: 100%;height:39px">
                                <option value="-">No Parent</option>
                                <?php
                                foreach($parents as $key=>$itm)
                                {
                                    echo $this->include('appdashboard/masterdata/menu/option',['parent' => $itm,'sparator'=>'',"itemid"=>$item->menu_app_id],true);
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Icon :</label>
                                <input  class="form-control" name="icon" value="<?php echo htmlentities($item->icon) ?>" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Order Sort :</label>
                                <input type="number" min="0"  class="form-control" name="order_sort" value="<?=$item->order_sort?>" placeholder=""/>
                            </div>
                            <div class="box-footer">
                                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
                            </div>
                        </form>
</div>
<?= $this->endSection() ?>
