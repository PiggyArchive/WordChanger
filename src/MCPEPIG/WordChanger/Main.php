<?php

namespace MCPEPIG\WordChanger;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  public function onEnable(){
    @mkdir($this->getServer()->getDataPath() . "/plugins/WordChanger/");
    $this->words = (new Config($this->getDataFolder()."Words.yml", Config::YAML, array(
      "words" => array(
         "op" => "poo"
      )
    )));
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("§aWordChanger by MCPEPIG loaded!");
  }
  public function onPlayerChat(PlayerChatEvent $event){
    $player = $event->getPlayer();
    $message = $event->getMessage();
    foreach($this->words->get("words") as $word => $replace){
      if($player->hasPermissionn("wordchanger.exempt") !== true){
        $message = str_ireplace($word, $replace, $message);
        $event->setMessage($message);     
      }
    }
  }
}
