<option class="parent_option" value="<?=$options['parent']->id?>"><?=$options['sparator'].($options['sparator']==''?'':'❯ ').$options['parent']->name?></option>
<?php
    foreach($options['parent']->child as $item)
    {
        echo $this->include('appdashboard/adminsystem/grouplevel/option',['parent' => $item,'sparator'=>$options['sparator'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'],true);       
    }
?>