<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid {
    /**
     * La llave utilizada como primaria, no es de autoincremento, sino UUID
     * @return bool
     */
    public function getIncrementing() {
        return false;
    }

    /**
     * La llave primaria es de tipo string
     * @return string
     */
    public function getKeyType() {
        return 'string';
    }

    protected static function bootUsesUuid() {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
