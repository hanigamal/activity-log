<?php

namespace Marquine\ActivityLog;

use Marquine\ActivityLog\Diff\Diff;

trait ActivityLog
{
    /**
     * Get all of the owning loggable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function loggable()
    {
        return $this->morphTo();
    }

    /**
     * Get the diff for the activity.
     *
     * @return array
     */
    public function getDiffAttribute()
    {
        return Diff::make($this);
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        $this->casts['before'] = 'array';
        $this->casts['after'] = 'array';

        return parent::getCasts();
    }

    /**
     * Get all of the appendable values that are arrayable.
     *
     * @return array
     */
    protected function getArrayableAppends()
    {
        $this->appends[] = 'diff';

        $this->appends = array_unique($this->appends);

        return parent::getArrayableAppends();
    }
}
