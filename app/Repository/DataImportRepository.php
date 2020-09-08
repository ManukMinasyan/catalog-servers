<?php


namespace App\Repository;

use App\Computers;
use App\Repository\Interfaces\DataImportInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class DataImportRepository extends BaseRepository implements DataImportInterface
{
    public function __construct(Computers $computers)
    {
        parent::__construct($computers);
    }

    public function ImportData($data)
    {
        $insertData = [];
        $dateNow = Carbon::now();
        foreach ($data->data as $k => $info) {
            $insertData[$k] = [
                'provider' => $info->provider,
                'provider_name' => $info->provider_name,
                'brand_label' => $info->brand_label,
                'location' => $info->location,
                'cpu' => $info->cpu,
                'drive_label' => $info->drive_label,
                'price' => $info->price,
                'updated_at' => $dateNow
            ];
        }
        try {
            $this->insertOrUpdate($insertData);
            $this->model->where('updated_at','<',$dateNow)->delete();
        } catch (Exception $exception) {
            return false;
        }
    }

    public function insertOrUpdate(array $rows)
    {
        $table = $this->model->getTable();
        $first = reset($rows);
        $columns = implode(',',
            array_map(function ($value) {
                return "$value";
            }, array_keys($first))
        );
        $values = implode(',', array_map(function ($row) {
                return '(' . implode(',',
                        array_map(function ($value) {
                            return '"' . str_replace('"', '""', $value) . '"';
                        }, $row)
                    ) . ')';
            }, $rows)
        );
        $updates = implode(',',
            array_map(function ($value) {
                return "$value = VALUES($value)";
            }, array_keys($first))
        );
        $sql = "INSERT INTO {$table}({$columns}) VALUES {$values} ON DUPLICATE KEY UPDATE {$updates}";
        return DB::statement($sql);
    }


}
