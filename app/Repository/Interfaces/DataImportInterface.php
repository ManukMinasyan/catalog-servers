<?php


namespace App\Repository\Interfaces;


interface DataImportInterface extends BaseRepositoryInterface
{

    /**
     * import data from Api Response to db
     *
     * @param $data
     * @return mixed
     */
    public function ImportData($data);

}
