<?php

namespace App\Models;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Biometric extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'year',
        'month',
        'week1',
        'week2',
        'week3',
        'week4',
        'week5',
    ];

    protected $primaryKey = 'id';
    protected $table = 'biometrics';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new Biometric)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('year', 'like', '%' . $search . '%');
                $query->orWhere('month', 'like', '%' . $search . '%');
            });
        }

        $query->select('*')->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
