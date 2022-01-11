<?php

namespace App\Utils;

use Illuminate\Database\Eloquent\Model;

trait CanRate {

    public function rate(Model $model, float $score) 
    {
        if ($this->hasRated($model)) {
            return false;
        }

        $ratings = $this->ratings($model);
        $ratings->attach($model->getKey(), [
            'score' => $score
        ]);

        return true;
    }

    public function ratings($model = null) 
    {
        $modelClass = $model ? $model : $this->getMorphClass();

        $morphToMany = $this->morphToMany(
            $modelClass, 'qualifier', 'ratings', 'qualifier_id', 'rataeable_id'
        );

        $morphToMany
            ->as('rating')
            ->withTimestamps()
            ->withPivot('score', 'reteable_type')
            ->wherePivot('reteable_type', $model)
            ->wherePivot('qualifier_type', $this->getMorphClass());
        
        return $morphToMany;
    }

    public function hasRated(Model $model) 
    {
        $ratings = $this->ratings($model->getMorphClass());
        $model = $ratings->find($model->getKey());
        return !is_null($model);
    }    
}