<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'project_id'];

    public static function getProjectId()
    {
        $prefix = request()->route()->project_id;
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
        return $project;
    }
}
