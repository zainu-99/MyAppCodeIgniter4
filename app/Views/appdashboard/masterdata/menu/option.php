<?php $itemid = (isset($options['itemid'])?$options['itemid']:'') ?>
<option <?php if($itemid == $options['parent']->id){ ?> selected <?php } ?> class="parent_option" value="<?=$options['parent']->id ."|". $itemid?>"><?=$options['sparator'].($options['sparator']==''?'':'❯ ').$options['parent']->menu_text?></option>
<?php
    foreach($options['parent']->child as $item)
    {
        echo $this->include('appdashboard/masterdata/menu/option',['parent' => $item,'sparator'=>$options['sparator'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','itemid'=>$itemid],true);       
    }
?>