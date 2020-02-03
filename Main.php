<?php

namespace WFO;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender, CommandExecutor};
use pocketmine\Player;

use pocketmine\event\block\BlockUpdateEvent;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\block\{Block, Cobblestone, Water, Lava, IronOre, DiamondOre, EmeraldOre, GoldOre, CoalOre, LapisOre, RedstoneOre, Stone};

class Main extends PluginBase implements Listener{
    
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§c§l\|/ §aPLUGIN Random Ore Water Với Lava Đã Bật \|/");
    }
    
    public function block(BlockUpdateEvent $event){
        $block = $event->getBlock();
        $water = false;
        $lava = false;
        for ($i = 2; $i <= 5; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof Water) {
                $water = true;
            } else if ($nearBlock instanceof Lava) {
                $lava = true;
            }
            if ($water && $lava) {
                $id = mt_rand(1, 20);
                switch ($id) {
                    case 2;
                        $newBlock = new Cobblestone();
                        break;
					case 4;
                        $newBlock = new IronOre();
                        break;
                    case 6;
                        $newBlock = new GoldOre();
                        break;
                    case 8;
                        $newBlock = new EmeraldOre();
                        break;
                    case 10;
                        $newBlock = new CoalOre();
                        break;
                    case 12;
                        $newBlock = new RedstoneOre();
                        break;
                    case 14;
                        $newBlock = new DiamondOre();
                        break;
					case 16;
                        $newBlock = new LapisOre();
                        break;
                    default:
                        $newBlock = new Cobblestone();
                        $newBlock = new Cobblestone();
                        $newBlock = new Stone();
                        $newBlock = new Stone();
                }
                $block->getLevel()->setBlock($block, $newBlock, true, false);
                return;
            }
        }
    }
}
