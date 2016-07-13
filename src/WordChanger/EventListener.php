<?php
namespace WordChanger;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;

class EventListener implements Listener {
    public function __construct($plugin) {
        $this->plugin = $plugin;
    }

    public function onPlayerChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        $message = $event->getMessage();
        foreach($this->plugin->words->getAll() as $word => $replacement) {
            if(!$player->hasPermission("wordchanger.override")) {
                $message = str_ireplace($word, $replacement, $message);
                $event->setMessage($message);
            }
        }
    }

}
