<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . "config/config.php";
require_once app('models/Item.php');

if (isset($_GET) &&  get_request('insert')):
    #....
    die('lets insert an item in the inventory');
elseif (isset($_GET) &&  get_request('delete')):
    #....
    die('lets update an item in the inventory');
elseif (isset($_GET) && get_request('edit_item')): # else update
    #....
    // die(var_dump($_POST));
    redirect_to('/views/inventory/update-items.php', $_GET['id']);
elseif (isset($_POST) &&  post_request('add_to_cart')) : # else update
    #....
    die('lets insert an item in the inventory');
elseif (get_request('delete')):
    #....
    die('lets update an item in the inventory');
elseif (get_request('edit_item')): # else update
    #....
    die('lets add an item in the inventory');
elseif (post_request('add_to_cart')) : # else update
    #....

    die(var_dump($_POST));
else:
    die(var_dump('else block'));
endif;


?>