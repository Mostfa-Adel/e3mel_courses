<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends BaseRepository{
    

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'active',
    ];

    private static $levels=[
        'beginner','intermediate', 'advanced'
    ];

    public static function getLevels()
    {
        return self::$levels;
    }
    public static function getLevelName($k)
    {
        return isset(self::getLevels()[$k])?self::getLevels()[$k]:null;
    }

        /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Course::class;
    }


}