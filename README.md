# Yii2 marker-clusterer widget

[![Latest Stable Version](https://poser.pugx.org/edofre/yii2-marker-clusterer/v/stable)](https://packagist.org/packages/edofre/yii2-marker-clusterer)
[![Total Downloads](https://poser.pugx.org/edofre/yii2-marker-clusterer/downloads)](https://packagist.org/packages/edofre/yii2-marker-clusterer)
[![Latest Unstable Version](https://poser.pugx.org/edofre/yii2-marker-clusterer/v/unstable)](https://packagist.org/packages/edofre/yii2-marker-clusterer)
[![License](https://poser.pugx.org/edofre/yii2-marker-clusterer/license)](https://packagist.org/packages/edofre/yii2-marker-clusterer)
[![composer.lock](https://poser.pugx.org/edofre/yii2-marker-clusterer/composerlock)](https://packagist.org/packages/edofre/yii2-marker-clusterer)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/yii2-marker-clusterer
```

or add

```
"edofre/yii2-marker-clusterer": "v1.0.1"
```

to the ```require``` section of your `composer.json` file.

## Usage 

MarkerClusterer extension to be used in co-operation with [2amigos/yii2-google-maps-library](https://github.com/2amigos/yii2-google-maps-library)

Below you will find a full example of a view file that uses the clusterer
```php
<?php

/* @var $this yii\web\View */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;

// edofre objects instead of dosamigos
use edofre\markerclusterer\Map;
use edofre\markerclusterer\Marker;

$this->title = 'Maps Clusterer';
?>
<div class="maps-index">
	<?php
	$map = new Map([
		'center' => new LatLng(['lat' => 52.1326, 'lng' => 5.2913]), // Center of Netherlands
		'zoom'   => 7,
	]);

	$cities = [
		'Utrecht'    => new LatLng(['lat' => 52.0841659, 'lng' => 5.0124518]),
		'Groningen'  => new LatLng(['lat' => 53.2216845, 'lng' => 6.4947123]),
		'Amsterdam'  => new LatLng(['lat' => 52.3745291, 'lng' => 4.7585311]),
		'Amstelveen' => new LatLng(['lat' => 52.2861961, 'lng' => 4.7820703]),
		'Hilversum'  => new LatLng(['lat' => 52.2315507, 'lng' => 5.0905084]),
		'Ede'        => new LatLng(['lat' => 52.052436, 'lng' => 5.6301072]),
		'Amersfoort' => new LatLng(['lat' => 52.1589302, 'lng' => 5.3077834]),
		'Zwolle'     => new LatLng(['lat' => 52.514148, 'lng' => 5.9669147]),
		'Leiden'     => new LatLng(['lat' => 52.1517316, 'lng' => 4.4466504]),
		'Rotterdam'  => new LatLng(['lat' => 51.9279514, 'lng' => 4.4203666]),
		'The Hague'  => new LatLng(['lat' => 52.0716334, 'lng' => 4.2398287]),
		'Delft'      => new LatLng(['lat' => 51.9995297, 'lng' => 4.3286785]),
		'Eindhoven'  => new LatLng(['lat' => 51.4455368, 'lng' => 5.3814706]),
	];

	foreach ($cities as $city => $lat_lng) {
		$marker = new Marker([
			'position'  => $lat_lng,
			'title'     => $city,
			'clickable' => true,
		]);

		$marker->attachInfoWindow(new InfoWindow(['content' => "<strong>{$city}</strong>"]));
		$map->addOverlay($marker);
	}

	$map->center = $map->getMarkersCenterCoordinates();
	$map->zoom = $map->getMarkersFittingZoom() - 1;
	?>

	<div class="row">
		<div class="col-sm-12">
			<?= $map->display(); ?>
		</div>
	</div>
</div>

```


Make sure to add the google maps key to your assetManager

```php
'assetManager' => [
	'bundles' => [
		'dosamigos\google\maps\MapAsset' => [
			'options' => [
				'key'      => 'XYZ',
				'language' => 'nl',
				'version'  => '3.1.18',
			],
		],
	],
],
```