<?php

namespace xtakumatutix\noplace;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use xtakumatutix\noplace\EventListener;

Class Main extends PluginBase 
{

    public function onEnable() 
    {
        $this->getLogger()->notice("起動メッセージを送信しました - ver.".$this->getDescription()->getVersion());
        $this->getServer()->getCommandMap()->register("noplace", new noplaceCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->id = new Config($this->getDataFolder() . "id.yml", Config::YAML,);
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            '表示メッセージ' => '§cそのブロックは置けません'
        ]);
    }
}