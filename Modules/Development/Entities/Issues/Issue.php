<?php

namespace Modules\Development\Entities\Issues;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Companies\Entities\Employees\Employee;
use Modules\Development\Entities\Issues\IssueStatus;
use Modules\Development\Entities\Projects\Project;
use Modules\Development\Entities\Sprints\Sprint;
use Modules\Development\Entities\Issues\IssueType;

class Issue extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'description',
		'deadline',
		'project_id',
		'employee_id',
		'type_id',
		'sprint_id',
		'priority_order',
		'sort_prev',
		'sort_next',
	];

	protected $dates = ['deadline'];

	public function setDeadlineAttribute($date)
	{
		try {
			$this->attributes['deadline'] = Carbon::createFromFormat('Y-m-d', $date);
			$this->attributes['deadline']->hour = '23';
			$this->attributes['deadline']->minute = '55';
			$this->attributes['deadline']->second = '55';
		} catch (\Exception $e) {
			$this->attributes['deadline'] = NULL;
		}
	}

	public function getDeadlineAttribute($date)
	{
		if ($date != null) {
			return new Carbon($date);
		}
	}

	/**
	 * An issue belongs to a project
	 */
	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	/**
	 * An issue belongs to a user
	 * @return type
	 */
	public function user()
	{
		return $this->belongsTo(Employee::class);
	}

	/**
	 * An issue has one issue type
	 */
	public function issueType()
	{
		return $this->belongsTo(IssueType::class, 'type_id');
	}

	/**
	 * An issue has one sprint
	 */
	public function sprint()
	{
		return $this->belongsTo(Sprint::class);
	}

	/**
	 * An issue status belongs to an issue
	 */
	public function issueStatus()
	{
		return $this->belongsTo(IssueStatus::class, 'status_id');
	}
}
