<?php
require_once 'autoload.php';

use App\Components\TravelPlan;
use App\Decorators\Packs\AirplanePack;
use App\Decorators\Packs\HotelPack;

$plan_base = new TravelPlan();
$plan_base->setPlan('沖縄');
$plan_base->setDuration('9/20 - 9/25');
echo '<h2>旅行プラン（ベース）</h2>';
echo sprintf('%s　%s', $plan_base->getDuration(), $plan_base->getPlan());

$pack_plan_1 = new AirplanePack($plan_base, 'Laravel航空', 50000);
echo '<h2>旅行プラン１　飛行機パック</h2>';
echo $pack_plan_1->getPlan();
echo number_format($pack_plan_1->getCost());

$pack_plan_2 = new HotelPack($plan_base, 'PHPホテル', 67000);
echo '<h2>旅行プラン２　ホテルパック</h2>';
echo $pack_plan_2->getPlan();
echo number_format($pack_plan_2->getCost());

echo '<h2>旅行プラン３　飛行機＋ホテルパック</h2>';
$pack_plan_3 = new HotelPack(
    new AirplanePack($plan_base, 'Laravel航空', 50000),
    'PHPホテル',
    67000
);
echo $pack_plan_3->getPlan();
echo number_format($pack_plan_3->getCost());