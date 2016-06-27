# Yii2 marker-clusterer widget

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/yii2-marker-clusterer "*"
```

or add

```
"edofre/yii2-marker-clusterer": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage 

MarkerClusterer extension to be used in co-operation with [2amigos/yii2-google-maps-library](https://github.com/2amigos/yii2-google-maps-library)

Make sure to add the google maps key to your assetManager

```php
'assetManager' => [
	'bundles' => [
		'dosamigos\google\maps\MapAsset' => [
			'options' => [
				'key'      => 'AIzaSyBPTzcjBwXfo3xnVjtJsblozv2dYsKCIBI',
				'language' => 'nl',
				'version'  => '3.1.18',
			],
		],
	],
],
```