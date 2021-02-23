<?php

namespace App\Models;

use Parsedown;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAtribute($value)
    {
        // $this->attributes['title'] = $value;
        // $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
        return route("questions.show", $this->id);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //funzione per cambiare colore agli status, collegato a scss
    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }

        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
}
