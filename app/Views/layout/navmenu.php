<?php
if(Session()->has('menuapp'))
   foreach(Session::get('menuapp') as $key=>$item)
   {
        $this->include('layout/itemmenu',['itemmenu' => $item],['treeview' => (count($item->Menus)>0)]);       
   }
?>