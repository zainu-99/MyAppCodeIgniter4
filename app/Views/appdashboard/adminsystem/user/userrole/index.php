<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
        <br/>
        <h3 class="card-title">
          LIST USER
        </h3><br/><hr/>
        <form action="" method="get">
            <div class="form-group">
              Group Level :  
            <select class="" id="id_group_level"  name="id_group_level" style="height:36px">
            <?php
            foreach($groupLevels as $key=>$groupLevel)
                {
                    echo '<option '.((filter_input(INPUT_GET,'id_group_level')==$groupLevel->id)? 'selected': '') .'  value="'.$groupLevel->id.'">'.$groupLevel->name.'-'.$groupLevel->note.'</option>';
                }
            ?>
            </select>
            
                <input type="submit" name="submit" type="submit" class="btn-sm btn-primary" value="FILTER"/>
            </div>
        </form>
        <br/>
      </div>
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>No</td>
                          <td>Role</td>
                          <td>View</td>
                          <td>Add</td>
                          <td>Edit</td>
                          <td>Delete</td>
                          <td>Print</td>
                          <td>Custom</td>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($list as $key=>$item)
                    {?>
                    <tr> 
                      <td><?=$key+1?></td>
                      <td><?=$item->name?></td>
                      <td><?php if($item->isview == 1){ ?>
                        <input id="cbview<?=$key+1?>" type="checkbox" <?php if($item->allow_view == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?>
                      </td>
                      <td><?php if($item->isadd == 1){ ?>
                          <input id="cbadd<?=$key+1?>" type="checkbox" <?php if($item->allow_add == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                      <td><?php if($item->isedit == 1){ ?>
                        <input id="cbedit<?=$key+1?>" type="checkbox" <?php if($item->allow_edit == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                      <td><?php if($item->isdelete == 1){ ?>
                        <input id="cbdelete<?=$key+1?>" type="checkbox" <?php if($item->allow_delete == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                      <td><?php if($item->isprint == 1){ ?>
                        <input id="cbprint<?=$key+1?>" type="checkbox" <?php if($item->allow_print == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                      <td><?php if($item->iscustom == 1){ ?>
                        <input id="cbcustom<?=$key+1?>" type="checkbox" <?php if($item->allow_orther == 1){?> checked <?php } ?> onclick="checkedis(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                  </tr>
                  <?php
                    }
                    ?>
                  </tbody>
              </table>
            </div>
      </div>
<script>
  function checkedis(idrole,key)
  {
    $.ajax({
            type:'POST',
            url:'<?= current_url() ?>/add',
            data:{ 
                <?= csrf_token() ?>: '<?= csrf_hash() ?>', 
              id_role:idrole,
              allow_view:+$('#cbview'+key).is(':checked'),
              allow_add:+$('#cbadd'+key).is(':checked'),
              allow_edit:+$('#cbedit'+key).is(':checked'),
              allow_delete:+$('#cbdelete'+key).is(':checked'),
              allow_print:+$('#cbprint'+key).is(':checked'),
              allow_custom:+$('#cbcustom'+key).is(':checked'),
            },
            success:function(data){      
                //alert(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.responseText);
                //alert(thrownError);
            }
        }); 
  }
</script>
<?= $this->endSection() ?>
