<tr <?php if($options['sparator'] ==""){?> style="font-weight: bold" <?php } ?> >
    <td nowrap><?=$options['sparator'].($options['sparator']==''?'':'❯ ').$options['itemmenu']->menu_text?></td>
    <td nowrap><?=$options['itemmenu']->role_name?></td>
    <td nowrap><?=$options['itemmenu']->role_url?></td>
    <td nowrap><?=$options['itemmenu']->icon?></td>
    <td nowrap><?=$options['itemmenu']->order_sort?></td>
    <td nowrap><?=$options['itemmenu']->created_at?></td>
    <td nowrap><?=$options['itemmenu']->updated_at?></td>
    <td style="width: 237px" nowrap>    
        <?=$this->include('layout/action/edit-button',["id"=>$options['itemmenu']->id,"btnname" => ""],true)?>
        <?=$this->include('layout/action/delete-button',["id"=>$options['itemmenu']->id,"btnname" => ""],true)?>  
    </td>
</tr>
<?php
    foreach($options['itemmenu']->child as $item)
    {
        echo $this->include('appdashboard/masterdata/menu/tr_table',['itemmenu' => $item,'sparator'=>$options['sparator'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'],true);       
    }
?>