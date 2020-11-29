<?php 
if($options["treeview"])
{ ?>
    <li class="nav-item has-treeview menu-close">
        <a href="#" class="nav-link ">
            <?=$options["itemmenu"]->icon?>
          <p>
            <?=$options["itemmenu"]->menu_text?>
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
           <?php
            foreach($options["itemmenu"]->child as $key=>$item)
            {
                echo $this->include('layout/itemmenu',['itemmenu' => $item,'treeview' => (count($item->child)>0)],true);       
            }
           ?>
        </ul>
    </li>
<?php
}
else
{
?>
    <li class="nav-item">
        <a href="<?=base_url().$options["itemmenu"]->role_url?>" class="nav-link item-menu">
            <?=$options["itemmenu"]->icon?>
            <p><?=$options["itemmenu"]->menu_text?></p>
          </a>
    </li>
<?php
}