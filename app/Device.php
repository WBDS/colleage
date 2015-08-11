<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/11/2015
 * Time: 3:58 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Device  extends Model{

    protected $table = 'devices';

    public $timestamps = false;

    protected $fillable = ['uid', 'type', 'device_id'];
} 