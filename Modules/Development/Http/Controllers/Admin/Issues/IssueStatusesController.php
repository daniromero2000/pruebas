<?php

namespace Modules\Development\Http\Controllers\Admin;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IssueRequest;
use Carbon\Carbon;
use App\Issue;
use App\Project;
use App\IssueType;
use App\IssueStatus;

class IssueStatusesController extends Controller
{

	public function __construct()
	{
		$this->middleware(['permission:projects, guard:employee']);
	}

	/**
	 * Return the collection of issue statuses
	 * @return Response
	 */
	public function index()
	{
		$issuestatuses = IssueStatus::all();
		return $issuestatuses;
	}
}
