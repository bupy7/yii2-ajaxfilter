#Ajax filter for Yii2

Filter deny or allow access to actions of controllers.

##Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
$ php composer.phar require bupy7/yii2-ajaxfilter "dev-master"
```

or add
```
"bupy7/yii2-ajaxfilter": "dev-master"
```

to the **require** section of your **composer.json** file.

##How use

```php
use bupy7\ajaxfilter\AjaxFilter;

public function behaviors()
{
	return [
		'ajax' => [
			'class' => AjaxFilter::className(),
			'actions' => [
				'actionName' => ['ajax'],
			],
		],
	];
}
```

##Thanks

[vov4ik08](https://github.com/vov4ik08)

##License

yii2-ajaxfilter is released under the BSD 3-Clause License.
