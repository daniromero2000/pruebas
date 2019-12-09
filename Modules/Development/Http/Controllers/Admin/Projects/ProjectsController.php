<?php

namespace Modules\Development\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Development\Entities\IssueStatuses\Repositories\Interfaces\IssueStatusRepositoryInterface;
use Modules\Development\Entities\Projects\Requests\CreateProjectRequest;
use Modules\Development\Entities\Projects\Project;
use Modules\Development\Entities\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use Modules\Development\Entities\Sprints\Repositories\Interfaces\SprintRepositoryInterface;

class ProjectsController extends Controller
{
	protected $projectInterface, $sprintInterface, $issueStatusInterface;
	protected $issueTypeInterface;

	public function __construct(
		ProjectRepositoryInterface $projectRepositoryInterface,
		SprintRepositoryInterface $sprintRepositoryInterface,
		IssueStatusRepositoryInterface $issueStatusRepositoryInterface
	) {
		$this->projectInterface = $projectRepositoryInterface;
		$this->sprintInterface = $sprintRepositoryInterface;
		$this->issueStatusInterface = $issueStatusRepositoryInterface;
		$this->middleware(['permission:projects, guard:employee']);
	}

	/**
	 * Return a view to display the list of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('development::projects.index')->with([
			'projects' => $this->projectInterface->getLatesProjects(),
			'issueStatuses' => $this->issueStatusInterface->listIssueStatuses()
		]);
	}

	/**
	 * Show the form for creating a new project.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('development::projects.create');
	}

	/**
	 * Store a newly created project in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProjectRequest $request)
	{
		$data                 = $request->all();
		$data['slug']         = str_slug($request->input('name'));
		$data['issue_prefix'] = $data['slug'];
		$data['employee_id'] = 	auth()->guard('employee')->user()->id;
		$project = $this->projectInterface->createProject($data);
		$this->sprintInterface->createBacklogSprint($project->id);

		return redirect()->route('admin.projects.index');
	}

	/**
	 * Display the specified project.
	 *
	 * @return Response
	 */
	public function show(Project $project)
	{
		if ($activeSprint = $project->activeSprints) {

			$project = $this->projectInterface->findProjectById($project->id);
			$issues = 	$project->getIssuesFromSprint($activeSprint->id);
		} else {
			$issues = [];
		}

		return view('development::projects.show')->with([
			'project' => $project,
			'issues' => $issues,
			'sprint' => $activeSprint,
			'issueStatuses' => $this->issueStatusInterface->listIssueStatuses()

		]);
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @return Response
	 */
	public function edit(Project $project)
	{
		return view('development::projects.edit')->with([
			'project' => $project,
			'deadline' => ($project->deadline) ? $project->deadline->format('Y-m-d') : null
		]);
	}

	/**
	 * Update the specified project in storage.
	 *
	 * @return Response
	 */
	public function update(Project $project, Request $request)
	{
		$project->update($request->all());

		return redirect()->route('admin.projects.index');
	}

	/**
	 * Return the project plan view
	 * @param Project $project
	 * @return Response
	 */
	public function plan($project)
	{
		return view('development::projects.plan')->with([
			'project' => $this->projectInterface->findProjectById($project),
			'issueStatuses' => $this->issueStatusInterface->listIssueStatuses()
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
