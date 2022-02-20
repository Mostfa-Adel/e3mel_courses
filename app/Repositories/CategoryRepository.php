<?php

namespace App\Repositories;

use App\Models\Category;
class CategoryRepository extends BaseRepository{
    

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'active',
    ];


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
        return Category::class;
    }

    /**
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function allCategories()
    {
        return $this->allQuery()->activated()->orderBy('name')->get();
    }
}