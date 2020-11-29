<?= $this->include('layouts/action/template.php') ?> 

<div class="card-header">
    <br/>
    <h3 class="card-title">
       <?= $this->include('layouts/action/add-button.php') ?> 
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
                url:'{{Request::url()}}/edit/' + iduser,
                data:{ 
                _token: '{{ csrf_token() }}', 
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
            window.location = "{{Request::url()}}/delete/" + id;
        }
    }
     $(document).ready(function() {
      
     });
    </script>
