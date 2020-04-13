<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Jabatan extends Model{
    
    protected $table="tbl_jabatan";
    protected $primaryKey="id_jabatan";
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
        return route( 'jabatan.delete', [ 'id' => $this->id_jabatan ] );
    }
    public function getViewUrlAttribute() {
        return route( 'jabatan.view', [ 'id' => $this->id_jabatan ] );
    }
}