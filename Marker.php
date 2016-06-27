<?php
namespace edofre\markerclusterer;

/**
 * Class Marker
 * @package edofre\markerclusterer
 */
class Marker extends \dosamigos\google\maps\overlays\Marker
{

	/**
	 * The constructor js code for the Marker object
	 * @return string
	 */
	public function getJs()
	{
		$js = $this->getInfoWindowJs();

		$js[] = "var {$this->getName()} = new google.maps.Marker({$this->getEncodedOptions()});";
		// add the marker to markers array
		$js[] = "markers.push({$this->getName()});";

		foreach ($this->events as $event) {
			/** @var \dosamigos\google\maps\Event $event */
			$js[] = $event->getJs($this->getName());
		}

		return implode("\n", $js);
	}
}