<?php

namespace WordChanger;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->words = new Config($this->getDataFolder() . "words.yml", Config::YAML);
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getLogger()->info("§aEnabled.");
    }

}
