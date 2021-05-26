<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mindscms\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    public static function tree($level = 1)
    {
        return static::with(\implode('.', \array_fill(0, $level, 'children')))
            ->whereParent(0)
            ->whereAppear(1)
            ->whereSidebarLink(1)
            ->orderBy('ordering', 'asc')
            ->get();
    }
}
