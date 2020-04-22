<?php
declare(strict_types = 1);

/**
 * @name PrisonEssentialsAddon
 * @version 1.0.0
 * @main JackMD\ScoreHud\Addons\PrisonEssentialsAddon
 * @depend PrisonEssentials
 */
namespace JackMD\ScoreHud\Addons
{
	use JackMD\ScoreHud\addon\AddonBase;
	use DaRealAqua\PrisonEssentials\commands;
	use DaRealAqua\PrisonEssentials\commands\MyStatusCommand;
	use DaRealAqua\PrisonEssentials\commands\RankupCommand;
	use pocketmine\Player;

	class PrisonEssentialsAddon extends AddonBase{

		/** @var PrisonEssentials */
		private $prisonEssentials;

		public function onEnable(): void{
			$this->prisonEssentials = $this->getServer()->getPluginManager()->getPlugin("PrisonEssentials");
		}

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			return [
				"{prisone_rank}" => $this->prisonEssentials->getRank($player),
				"{prisone_prestige}" => $this->prisonEssentials->getPrestige($player),
				"{prisone_rank_price}" => $this->prisonEssentials->calculateMoney($player),
				"{prisone_rank_next}" => $this->prisonEssentials->getNextRank($player),
				"{prisone_prestige_next}" => $this->prisonEssentials->getNextPrestige($player)
			];
		}
	}
}