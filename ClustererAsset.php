<?php

namespace edofre\markerclusterer;

/**
 * Class ClustererAsset
 * @package edofre\markerclusterer
 */
class ClustererAsset extends \yii\web\AssetBundle
{
	/** @var array */
	public $js = [
		'js/markerclusterer.js',
	];
	/** @var array */
	public $depends = [
		'yii\web\JqueryAsset',
	];

	/**
	 *
	 */
	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';
		parent::init();
	}

	/**
	 * @return string
	 */
	public function getImagePath()
	{
		return $this->baseUrl . '/img/m';
	}
}