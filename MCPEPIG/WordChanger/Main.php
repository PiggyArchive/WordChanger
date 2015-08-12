<?php

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    @mkdir($this->getServer()->getDataPath() . "/plugins/PigCore/");
    $this->words = (new Config($this->getDataFolder()."Words.yml", Config::YAML, array(
      "words" => array(
         "op" => "poo"
      ),
    )))->getAll();
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("§aWordChanger by MCPEPIG loaded!");
  }
  public function onPlayerChat(PlayerChatEvent $event){
    $message = $event->getMessage();
  }
}
