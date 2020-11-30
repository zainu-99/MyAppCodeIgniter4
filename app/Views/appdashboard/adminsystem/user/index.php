<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
    <br/>
    <h3 class="card-title">
      <?=$this->include('layout/action/add-button',["btnname"=>"Add User"],true)?>
    </h3>
    <br/>
</div>
<div class="card-body">
        <div style="overflow: auto;">
          <table id="serversidedatatable"  class="table table-hover">
              <thead >
                  <tr> 
                      <td>No</td>
                      <td>User ID</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>NoHp</td>
                      <td>Address</td>
                      <td>Gender</td>
                      <td>Created At</td>
                      <td>Updated At</td>
                      <td>Action</td>
                  </tr>
              </thead>
               <tbody>
                    <?php
                    foreach($list as $key=>$item)
                    {
                    ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td nowrap><?=$item->userid?></td>
                        <td nowrap><?=$item->name?></td>
                        <td nowrap><?=$item->email?></td>
                        <td nowrap><?=$item->no_hp?></td>
                        <td nowrap><?=$item->address?></td>
                        <td><?=$item->gender == '0'?'Female':'Male' ?></td>
                        <td nowrap><?=$item->created_at?></td>
                        <td nowrap><?=$item->updated_at?></td>
                        <td style="width: 237px" nowrap>
                            <a title="reset password to admin" class="btn btn-xs btn-warning text-light" onclick="resetPassword(<?=$item->id?>);" ><i class="fas fa-key"></i></a>
                            <a title="set user access" class="btn btn-xs btn-info text-light" href="<?=current_url().'/useraccess/'.$item->id?>"><i class="fas fa-shield-alt"></i></a>
                            <a title="set user group" class="btn btn-xs btn-warning text-light" href="<?= current_url().'/usergrouplevel/'.$item->id?>"><i class="fas fa-layer-group"></i></a>
                            <?=$this->include('layout/action/edit-button',["id"=>$item->id,"btnname" => ""],true)?>
                            <?=$this->include('layout/action/delete-button',["id"=>$item->id,"btnname" => ""],true)?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
              </tbody>
          </table>
        </div>
</div>
    <script>
      function resetPassword(iduser) 
      {        
        var r = confirm("Are You Sure Want To Reset password?");
        if (r == true) {
            $.ajax({
                type:'POST',
                url:'<?=current_url()?>/resetpassword/' + iduser,
                data:{ 
                <?= csrf_token() ?>: '<?= csrf_hash() ?>', 
                id_user:iduser,
                reset_pass:'reset_pass',
                },
                success:function(data){      
                    alert(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                 alert(xhr.responseText);
                 alert(thrownError);
                }
            }); 
        }
     }
     function alertDelete(id) {
        var r = confirm("Are You Sure Want To Delete?");
        if (r == true) {
            window.location = "<?=current_url()?>/delete/" + id;
        }
    }  
    </script>
<?= $this->endSection() ?>
