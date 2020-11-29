<a title="delete data" class="btn btn-xs btn-danger text-light" onclick="alertDelete(<?=$options['id']?>);"> <i class="fa fa-trash"></i> <?=$options['btnname']?> </a>
<script>
    function alertDelete(id) {
        var r = confirm("Are You Sure Want To Delete?");
        if (r == true) {
            window.location = "{{Request::url()}}/delete/" + id;
        }
    }
</script>