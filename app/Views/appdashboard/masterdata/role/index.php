<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
    <br/>
    <h3 class="card-title">
      <?=$this->include('layout/action/add-button',["btnname"=>"Add Role Master"],true)?>
    </h3>
    <br/>
</div>
<div class="card-body">
        <div style="overflow: auto;">
          <table id="serversidedatatable"  class="table table-hover">
              <thead >
                  <tr> 
                      <td>No</td>
                      <td>Name</td>
                      <td>Note</td>
                      <td>Controller</td>
                      <td>Url</td>
                      <td>View</td>
                      <td>Add</td>
                      <td>Edit</td>
                      <td>Delete</td>
                      <td>Print</td>
                      <td>Custom</td>
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
                        <td nowrap><?=$item->name?></td>
                        <td nowrap><?=$item->note?></td>
                        <td nowrap><?=$item->controller?></td>
                        <td nowrap><?=$item->url?></td>
                        <td nowrap><?=$item->accessview == '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->accessadd == '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->accessedit== '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->accessdelete == '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->accessprint == '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->accesscustom == '0'?'':'✔' ?></td>
                        <td nowrap><?=$item->created_at?></td>
                        <td nowrap><?=$item->updated_at?></td>
                        <td nowrap> 
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
                url:'<?=current_url()?>/edit/' + iduser,
                data:{ 
                _token: '<?= csrf_token() ?>', 
                id_user:iduser,
                reset_pass:'reset_pass',
                },
                success:function(data){      
                    alert(data);
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
