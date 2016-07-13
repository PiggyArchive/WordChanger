<?php
namespace WordChanger;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {
    public function onEnable() {
        $this->words = new Config($this->getDataFolder() . "words.yml", Config::YAML, ["op" => "poo"]);
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getLogger()->info("§aEnabled.");
    }

}
