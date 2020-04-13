<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Agama extends Model{
    
    protected $table="tbl_agama";
    protected $primaryKey="id_agama";
    protected $hidden =[
        'created_at',
        'updated_at',
        'deleted_at',
        'view_url',
        'delete_url'
    ];
    protected $appends = [
        'view_url',
        'delete_url'
    ];
    public function getDeleteUrlAttribute() {
        return route( 'agama.delete', [ 'id' => $this->id_agama ] );
    }
    public function getViewUrlAttribute() {
        return route( 'agama.view', [ 'id' => $this->id_agama ] );
    }
}