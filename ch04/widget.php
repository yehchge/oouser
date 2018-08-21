<?php

/**
 * @desc 觀察者模式(Observer Pattern)
 * @created 2018/08/21
 */

require_once('observable.php');
require_once('abstract_widget.php');

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$dat->addRecord("drum",   "$12.95",  1955);
$dat->addRecord("guitar", "$13.95",  2003);
$dat->addRecord("banjo",  "$100.95", 1945);
$dat->addRecord("piano",  "$120.95", 1999);

$widgetA->draw();
$widgetB->draw();
