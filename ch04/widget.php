<?php

/**
 * @desc 觀察者模式(Observer Pattern)
 * @created 2018/08/21
 */

require_once('observable.php');
require_once('abstract_widget.php');
require_once('border_decorator.php');
require_once('closebox_decorator.php');

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();

// 以下四行為裝飾者模式(Decorator Pattern)
// BorderDecorator 執行後有藍色邊框, 註解後就沒有, 可以試看看.
// CloseBoxDecorator 執行後表格上方有結束按鈕, 註解後沒有, 可以是看看.
// BorderDecorator 與 CloseBoxDecorator 執行順序不同, 也會不一樣, 試看看.

$widgetA = new CloseBoxDecorator($widgetA);
$widgetA = new BorderDecorator($widgetA);

$widgetB = new BorderDecorator($widgetB);
$widgetB = new CloseBoxDecorator($widgetB);

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$dat->addRecord("drum",   "$12.95",  1955);
$dat->addRecord("guitar", "$13.95",  2003);
$dat->addRecord("banjo",  "$100.95", 1945);
$dat->addRecord("piano",  "$120.95", 1999);

$widgetA->draw();
echo "<br>";
$widgetB->draw();
