<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'project', 'name', 'country', 'city', 'address', 'zip', 'plan_id', 'currency', 'started_at', 'ended_at', 'subscribed', 'trial'];

    public static function getProjectId($project_id = null)
    {
        $prefix = $project_id ?? request()->route()->project_id;
        $project = Project::where('project', $prefix)->first();
        return $project->id;
    }

    public static function getProjectIdOrFail()
    {
        $prefix = request()->route()->project_id;
        $project = Project::where('project', $prefix)->first();
        if (!$project) {
            abort(404);
        }
        return $project->id;
    }

    public static function getUserProjects()
    {
        return Project::where('user_id', getAdmin()->id)->get();
    }

    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function member()
    {
        return $this->hasMany('App\Models\Member');
    }

    public function vendor()
    {
        return $this->hasMany('App\Models\Vendor');
    }

    public function feature()
    {
        return $this->belongsTo('App\Models\Feature');
    }

    public function payment()
    {
        return $this->belongsToMany('App\Models\Payment');
    }
}
