<?php

namespace xtakumatutix\noplace;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\utils\Config;

class EventListener implements Listener 
{
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onplace(BlockPlaceEvent $event)
    {
        $config = $this->Main->id;
        $player = $event->getPlayer();
        $item = $event->getItem();
        $id = $item->getID();
        $damage = $item->getDamage();
        if(!$sender->isOP()){
            if ($config->exists($id.":".$damage)){
        	    $message = $this->Main->config->get('表示メッセージ');
        	    $player->sendMessage($message);
        	    $event->setCancelled();
        	}
        }
    }
}