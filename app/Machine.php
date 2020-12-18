<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
        use SoftDeletes;

        public function getRouteKeyName()
        {
                return 'url';
        }

        protected $fillable = [
                'status_deleted_at',
        ];

        protected $updated_at = 'U';
}
