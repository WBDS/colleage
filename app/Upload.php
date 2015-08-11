<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/11/2015
 * Time: 3:58 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Upload  extends Model{

    protected $table = 'uploads';

    public $timestamps = false;

    protected $fillable = ['pid', 'file_path'];
} 