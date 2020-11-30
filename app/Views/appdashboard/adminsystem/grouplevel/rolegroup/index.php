<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
        <br/>
        <h3 class="card-title">
          LIST ROLE GROUP LEVEL 
        </h3>
        <br/>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>No</td>
                          <td>Name</td>
                          <td>Note</td>
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
                            <td nowrap><?=$item->name?></td>
                            <td nowrap><?=$item->note?></td>
                            <td><?php if($item->accessview == 1){ ?>
                              <input id="cbview<?=$key+1?>" type="checkbox" <?php if($item->isview == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?>
                            </td>
                            <td><?php if($item->accessadd == 1) { ?>
                                <input id="cbadd<?=$key+1?>" type="checkbox" <?php if($item->isadd == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                            <td><?php if($item->accessedit == 1) { ?>
                              <input id="cbedit<?=$key+1?>" type="checkbox" <?php if($item->isedit == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                            <td><?php if($item->accessdelete == 1) { ?>
                              <input id="cbdelete<?=$key+1?>" type="checkbox" <?php if($item->isdelete == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                            <td><?php if($item->accessprint == 1) { ?>
                              <input id="cbprint<?=$key+1?>" type="checkbox" <?php if($item->isprint == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                            <td><?php if($item->accesscustom == 1) { ?>
                              <input id="cbcustom<?=$key+1?>" type="checkbox" <?php if($item->isorther == 1) { ?> checked <?php } ?> onclick="checkedAccess(<?=$item->id?>,<?=$key+1?>)"/><?php } ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                  </tbody>
              </table>
            </div>
</div>
<script>
  function checkedAccess(idrole,key)
  {
        $.ajax({
            type:'POST',
            url:'<?= current_url() ?>/add',
            data:{ 
              <?= csrf_token() ?>: '<?= csrf_hash() ?>',
              id_role:idrole,
              isview:+$('#cbview'+key).is(':checked'),
              isadd:+$('#cbadd'+key).is(':checked'),
              isedit:+$('#cbedit'+key).is(':checked'),
              isdelete:+$('#cbdelete'+key).is(':checked'),
              isprint:+$('#cbprint'+key).is(':checked'),
              iscustom:+$('#cbcustom'+key).is(':checked'),
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
