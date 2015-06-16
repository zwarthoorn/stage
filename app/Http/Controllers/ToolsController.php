<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Controllers\Controller;
use App\Tool;
use Illuminate\Http\Request;

class ToolsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$allTools = Tool::all()->toArray();
		
		return view('admin.tools.index',['tools'=>$allTools]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tools.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreToolRequest $tool)
	{
		if ($tool->ajax()) {
			return redirect()->back();
		}
		Tool::create([
			'name'=> $tool->get('tool'),
			'version'=>$tool->get('version')
			]);
		return redirect('tools');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gettools = Tool::where('name','LIKE',$id.'%')->get()->toArray();
		return json_encode($gettools);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tool = Tool::find($id)->toArray();
		return view('admin.tools.edit',['tool'=>$tool]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreToolRequest $tool)
	{
		$toolid = Tool::find($id);

		$toolid->name = $tool->get('tool');
		$toolid->version = $tool->get('version');
		$toolid->save();
		return redirect('tools');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$toolid = Tool::find($id);

		$toolid->delete();

		return redirect('tools');
	}

}
