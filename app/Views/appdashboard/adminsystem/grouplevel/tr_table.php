<tr <?php if($options['sparator'] ==""){?> style="font-weight: bold" <?php } ?> >
<td nowrap><?=$options['sparator'].($options['sparator']==''?'':'❯ ').$options['group']->name?></td>
    <td nowrap><?=$options['group']->note?></td>
    <td nowrap><?=$options['group']->created_at?></td>
    <td nowrap><?=$options['group']->updated_at?></td>
    <td style="width: 237px" nowrap>   
        <a title="set role group" class="btn btn-xs btn-info text-light" href="<?=base_url().'/appdashboard/adminsystem/grouplevel/rolegrouplevel'?>/<?=$options['group']->id?>"><i class="fas fa-shield-alt"></i></a> 
        <a class="btn btn-xs btn-success text-light" onclick="editRow(<?=$options['group']->id?>,<?=$options['group']->id_group?>,<?=$options['group']->group_level_id==''?-1:$options['group']->group_level_id
            ?>,'<?=$options['group']->note?>');"><i class="fa fa-edit"></i></a>
            <?=$this->include('layout/action/delete-button',["id"=>$options['group']->id,"btnname" => ""],true)?>  
    </td>
</tr>
<?php
    foreach($options['group']->child as $item)
    {
        echo $this->include('appdashboard/adminsystem/grouplevel/tr_table',['group' => $item,'sparator'=>$options['sparator'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'],true);       
    }
?>