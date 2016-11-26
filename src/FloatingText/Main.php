<?php
	
namespace FloatingText;

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\particle\Particle;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\Position\getLevel;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\math\Vector3;
use pocketmine\utils\config;
			
class Main extends PluginBase implements Listener{
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	$this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TF::GREEN ."Plugin by MagicPanda Enabled!");
    }
    
    public function onDisable(){
    	$this->getLogger()->info(TF::RED ."");
    }	
					
			public function onJoin(PlayerJoinEvent $event){
			 $player = $event->getPlayer();
             $level = $player->getLevel();
       $cfg = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
           $x1 = $cfg->get("Xs");
           $y1 = $cfg->get("Ys");
           $z1 = $cfg->get("Zs");
                $line1 = $cfg->get("LINE1");  
                $line2 = $cfg->get("LINE2"); 
                $line3 = $cfg->get("LINE3"); 
                $line4 = $cfg->get("LINE4"); 
                $line5 = $cfg->get("LINE5"); 
                      $online = count(Server::getInstance()->getOnlinePlayers()); 
                     $maxonline = $this->getServer()->getMaxPlayers();
                    $playername = $player->getName();
                   $ip = $this->getServer()->getIp();
                  $mote = $this->getServer()->getMotd();
                 $port = $this->getServer()->getPort();
                $version = $this->getServer()->getVersion();     
               $health = $this->player()->getHealth();                                     
              $rs = TF::RESET. "\n";
              $allline = $line1. $rs. $line2. $rs. $line3. $rs. $line4. $rs. $line5; 
              $allline = str_replace("{ONLINE}", $online, $allline);
              $allline = str_replace("{MAXONLINE}", $maxonline, $allline);
              $allline = str_replace("{PLAYERNAME}", $playername, $allline);
              $allline = str_replace("{IP}", $ip, $allline);
              $allline = str_replace("{MOTE}", $mote, $allline);
              $allline = str_replace("{PORT}", $port, $allline);
              $allline = str_replace("{VERSION}", $version, $allline);
              $allline = str_replace("{HEALTH}", $Health, $allline);
              $level->addparticle(new FloatingTextParticle(new Vector3($x1, $y1, $z1), $allline));
            
         }
          
}



