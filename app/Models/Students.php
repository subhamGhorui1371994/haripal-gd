<?php

namespace App\Models;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'course_type',
        'session_start',
        'session_end',
        'student_data',
    ];

    protected $primaryKey = 'id';
    protected $table = 'students';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new Students)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('course_type', 'like', '%' . $search . '%');
                $query->Where('session_start', 'like', '%' . $search . '%');
                $query->Where('session_end', 'like', '%' . $search . '%');
            });
        }

        $query->select('*')->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
