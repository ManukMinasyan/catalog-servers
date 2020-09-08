<?php


namespace App\Repository;


use App\Computers;
use Illuminate\Database\Eloquent\Model;

class ComputerRepository extends BaseRepository
{
    public function __construct(Computers $model)
    {
        parent::__construct($model);
    }

    /**
     * Create or Update resource in db
     * @param array $attributes
     * @return Model
     */
    public function createOrUpdate(array $attributes): Model
    {
        $arr = [
            'provider' => strtoupper($attributes['provider']),
            'provider_name' => $attributes['provider'],
            'brand_label' => $attributes['brand_label'],
            'location' => $attributes['location'],
            'cpu' => $attributes['cpu'],
            'drive_label' => $attributes['drive_label'],
            'price' => $attributes['price'],
        ];
        return $this->model->updateOrCreate(['provider_name' => $attributes['provider'], 'brand_label' => $attributes['brand_label'],], $arr);
    }

    /**
     * update specified record in db
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id) {
        $arr = [
            'provider' => strtoupper($attributes['provider']),
            'provider_name' => $attributes['provider'],
            'brand_label' => $attributes['brand_label'],
            'location' => $attributes['location'],
            'cpu' => $attributes['cpu'],
            'drive_label' => $attributes['drive_label'],
            'price' => $attributes['price'],
        ];
        return $this->model->whereId($id)->update($arr);

    }
}
