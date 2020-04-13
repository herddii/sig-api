<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Level extends Model{
    
    protected $table="tb_level";
    protected $primaryKey="id_level";
    protected $hidden =[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $appends = [
        'view_url',
        'delete_url'
    ];
    public function getDeleteUrlAttribute() {
        return route( 'level.delete', [ 'id' => $this->id_level ] );
    }
    public function getViewUrlAttribute() {
        return route( 'level.view', [ 'id' => $this->id_level ] );
    }
}