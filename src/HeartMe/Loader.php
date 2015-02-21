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
            case "disable":
                if($sender->hasPermission("heartme.command.date")){
                    if($sender instanceof Player){
                        
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
