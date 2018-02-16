<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
  //menggunakan softdeletes hrus memiliki delete at seperti dibawah
  use SoftDeletes;

  protected $table = "blog"; // untuk nama table kolom db
  protected $dates = ['deleted_at']; //untuk soft deletes2

  //file yang boleh dizinkan , atau judul besar dalam table yang boleh diizinkan
  //sedangkan guarded adalah blacklist atau tidak membolehkan judul besar
  public $fillable = ['title','description','email'];
  // public $timestamps = false; <<<--- jika sudah mempunyai kolom created_at dan updated_at
}
