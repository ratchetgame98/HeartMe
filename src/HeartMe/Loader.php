<?php

namespace HeartMe;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;

class Loader extends PluginBase{
    
    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN."HeartMe enabled.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED."HeartMe disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
            case "date":
                if($sender->hasPermission("heartme.command.date")){
                    if($sender instanceof Player){
                        $target = $this->getServer->getPlayer($args[0]);
                        $player = $sender->getName();
                        $name = $target->getName();
                        $target->sendMessage("$player wants to date you!")
                        $this->getServer()->broadcastMessage("There's a new couple in town: $player and $name!")
                    }
                    else{
                        $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
                    }
                }
                else{
                    $sender->sendMessage(TextFormat::RED."You don't have permissions to use this command.");
                    return true;
                }
            break;
            case "dump":
                if($sender->hasPermission("heartme.command.dump")){
                    if($sender instanceof Player){
                        $target = $this->getServer->getPlayer($args[0]);
                        $player = $sender->getName();
                        $name = $target->getName();
                        $target->sendMessage("$player has dumped you!")
                        $this->getServer()->broadcastMessage("$player dumped $name! This is really bad!")
                    }
                    else{
                        $sender->sendMessage(TextFormat::RED."Please run this command in-game.");
                    }
                }
                else{
                    $sender->sendMessage(TextFormat::RED."You don't have permissions to use this command.");
                    return true;
                }
            break;
        }
    }
}
