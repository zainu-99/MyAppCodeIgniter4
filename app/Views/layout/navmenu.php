<?php
if(Session()->has('menuapp'))
foreach(Session()->get("menuapp") as $key=>$item)
{
     echo $this->include('layout/itemmenu',['itemmenu' => $item,'treeview' => (count($item->child)>0)],true);       
}
?>
