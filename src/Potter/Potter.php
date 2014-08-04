<?php
namespace Potter;

use Potter\Post\QueryModel;
use Potter\Theme\Features;
use Potter\Utils\Metabox;

class Potter
{
    /**
     * @var PotterCore
     */
    private static $potter;
    private static $features;
    /**
     * @param PotterCore $potterCore
     */
    public function __construct(PotterCore $potterCore, Features $features)
    {
        self::$potter   = $potterCore;
        self::$features = $features;
    }

    /**
     * @return PotterCore
     */
    public static function core()
    {
        return self::$potter;
    }

    /**
     * @param $name
     *
     * @return QueryModel
     */
    public static function model($name)
    {
        $_PostType = self::core()->getModels()->get($name);

        $query = new QueryModel($_PostType);

        return $query;
    }

    /**
     * @return Features
     */
    public static function features()
    {
        return self::$features;
    }

    /**
     * @param $attributes
     * @param $fields
     * @param $autoRegister
     *
     * @return Metabox
     */
    public static function makeMetabox(array $attributes, array $fields = array(), $autoRegister = true)
    {
        return new Metabox($attributes, $fields, $autoRegister);
    }
}