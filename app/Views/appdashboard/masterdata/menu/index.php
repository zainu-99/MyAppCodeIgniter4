<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card-header">
    <br/>
    <h3 class="card-title">
    <?=$this->include('layout/action/add-button',["btnname"=>"Add Menu Master"],true)?>
    </h3>
    <br/>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
        <div style="overflow: auto;">
          <table id=""  class="table table-hover">
              <thead >
                  <tr class="text-light bg-dark"> 
                      <th>Menu Text</th>
                      <th>Role</th>
                      <th>URL</th>
                      <th>Icon</th>
                      <th>Sort</th>
                      <th >Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                foreach($list as $key=>$item)
                {
                    echo $this->include('appdashboard/masterdata/menu/tr_table',['itemmenu' => $item,'sparator'=>''],true);       
                }
                ?>
              </tbody>
          </table>
        </div>
</div>
<?= $this->endSection() ?>
