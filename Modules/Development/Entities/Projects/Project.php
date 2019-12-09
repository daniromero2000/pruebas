<?php

namespace Modules\Development\Entities\Projects;

use Modules\Development\Entities\Sprint;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Companies\Entities\Employees\Employee;
use Modules\Development\Entities\Issues\IssueStatus;
use Modules\Development\Entities\Issues\Issue;

class Project extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'slug',
		'issue_prefix',
		'deadline',
		'employee_id', // need this for Faker
	];

	protected $dates = [
		'deadline',
		'deleted_at',
		'created_at',
		'updated_at'
	];

	public function setDeadlineAttribute($date)
	{
		if ($date) {
			$this->attributes['deadline'] = Carbon::createFromFormat('Y-m-d', $date);
			$this->attributes['deadline']->hour = '23';
			$this->attributes['deadline']->minute = '55';
			$this->attributes['deadline']->second = '55';
		} else {
			$this->attributes['deadline'] = null;
		}
	}

	public function getDeadlineAttribute($date)
	{
		if ($date) {
			return new Carbon($date);
		} else {
			return false;
		}
	}

	public function user()
	{
		return $this->belongsTo(Employee::class);
	}

	/*
	 * A project can have many issues
	 */
	public function issues()
	{
		return $this->hasMany(Issue::class);
	}

	/**
	 * Get issues that are active (not archived)
	 * @return  collection
	 */

	public function getActiveIssues()
	{
		$archiveStatusId = IssueStatus::getIdByMachineName('archive');
		return $this->issues()->where('status_id', '!=', (int) $archiveStatusId)->get();
	}

	/*
	 * A project can have many sprints
	 */
	public function sprints()
	{
		return $this->hasMany(Sprint::class);
	}

	/**
	 * Get the list of sprints from a project that are not complete
	 * @return collection $sprints
	 */
	public function getSprints()
	{
		$sprints = $this->sprints()
			->where('status_id', '!=', 4)
			->orderBy('sort_order', 'desc')->get();
		return $sprints;
	}

	/**
	 * Get the collection of issues corresponding to a given sprint - that are not archived
	 * @param integer $sprintId
	 * @return collection
	 */
	public function getIssuesFromSprint($sprintId)
	{
		return $this->issues()
			->where('status_id', '!=', 1)
			->where('sprint_id', '=', (int) $sprintId)->get();
	}


	public function activeSprints()
	{
		return $this->hasOne(Sprint::class)->whereStatusId(3)->latest();
	}


	/**
	 * getBacklogSprint Get the backlog sprint for a project
	 * @return backlog sprint from collection
	 */
	public function getBacklogSprint()
	{
		return $this->sprints()->where('machine_name', '=', 'backlog')->get()->first();
	}
}
