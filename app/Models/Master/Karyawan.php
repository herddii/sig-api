<?php
namespace App\Models\Master;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Master\Agama;

class Karyawan extends Model{
    
    protected $table="tbl_karyawan";
    protected $primaryKey="id_karyawan";
    protected $hidden =[
        'insert_user',
        'update_user',
        'delete_user',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $appends = [
        'view_url',
        'delete_url'
    ];
    public function getDeleteUrlAttribute() {
        return route( 'karyawan.delete', [ 'id' => $this->id_karyawan ] );
    }
    public function getViewUrlAttribute() {
        return route( 'karyawan.view', [ 'id' => $this->id_karyawan ] );
    }

    public function agama(){
        return $this->belongsTo('\App\Models\Master\Agama','id_agama','id_agama');
    }

    public function kota(){
        return $this->belongsTo('\App\Models\Master\Kota','tempat_lahir','id_kota');
    }
}