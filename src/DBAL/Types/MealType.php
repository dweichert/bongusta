<?php declare(strict_types=1);

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class MealType extends AbstractEnumType
{
    const BREAKFAST = 'breakfast';
    const DESSERT = 'dessert';
    const MAIN_COURSE = 'main_course';
    const PASTRY = 'pastry';
    const SALAD = 'salad';
    const SNACK = 'snack';
    const SOUP = 'soup';
    const STARTER = 'starter';

    protected static $choices = [
        self::BREAKFAST => 'Fr&uuml;hst&uuml;ck',
        self::DESSERT => 'Dessert',
        self::MAIN_COURSE => 'Hauptgericht',
        self::PASTRY => 'Kuchen &amp; Geb&auml;ck',
        self::SALAD => 'Salat',
        self::SNACK => 'Snack',
        self::STARTER => 'Vorspeise'
    ];
}

