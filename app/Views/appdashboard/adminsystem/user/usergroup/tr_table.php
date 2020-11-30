<tr <?php if($options['sparator'] ==""){?> style="font-weight: bold" <?php } ?> >
    <td nowrap><?=$options['sparator'].($options['sparator']==''?'':'❯ ').$options['group']->name?></td>
    <td nowrap><?=$options['group']->note?></td>
    <td style="width: 237px">   
<input class="checkbox" <?php if($options['group']->isjoin == 1) { ?> checked<?php }?> onclick="checkedJoin(<?=$options['group']->id?>,$(this).val());" type="checkbox">
    </td>
</tr>
<?php
    foreach($options['group']->child as $item)
    {
        echo $this->include('appdashboard/adminsystem/user/usergroup/tr_table',['group' => $item,'sparator'=>$options['sparator'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'],true);       
    }
?>