<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
        <h3 class="card-title">
          LIST USER GROUP LEVEL 
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>Group</td>
                          <td>Note</td>
                          <td>Join</td>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($list as $item)
                        {
                            echo $this->include('appdashboard/adminsystem/user/usergroup/tr_table',['group' => $item,'sparator'=>''],true);       
                        }
                    ?>
                  </tbody>
              </table>
            </div>
      </div>
      <script>
            function checkedJoin(idgrouplevel,ischecked)
            {
              $.ajax({
                      type:'POST',
                      url:'<?= current_url() ?>/add',
                      data:{ 
                        <?= csrf_token() ?>: '<?= csrf_hash() ?>', 
                        is_checked:(ischecked==0?1:0),
                        id_group_level:idgrouplevel,
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
