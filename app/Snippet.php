<?php

namespace App;

class Snippet extends Model
{
    /**
     * A snippet may have multiple forks.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forks()
    {
        return $this->hasMany(Snippet::class, 'forked_id'); 
    }

    /**
     * A snippet may be forked from another snippet.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originalSnippet()
    {
        return $this->belongsTo(Snippet::class, 'forked_id');   
    }

    /**
     * Determine if the current snippet is a fork.
     * 
     * @return boolean
     */
    public function isAFork()
    {
        return !! $this->forked_id;     
    }
}
