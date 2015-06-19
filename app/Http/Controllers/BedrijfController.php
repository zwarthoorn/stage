<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BedrijfFormRequest;
use App\Bedrijf;
use App\Tool;
use App\Bedrijf_Tool;
use File;


class BedrijfController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		
		$bedrijfen = Bedrijf::all()->toArray();
		return view('admin.index',['bedrijven'=>$bedrijfen]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.createuser');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BedrijfFormRequest $bedrijf)
	{

		$logo = $bedrijf->file('image');
		
		

		$makebedrijf = Bedrijf::create([
			'name'=>$bedrijf->get('bedrijfsnaam'),
			'email'=>$bedrijf->get('email'),
			'disc'=>$bedrijf->get('bedrijfsinfo'),
			'img'=>$logo->getClientOriginalName()
			]);
		$idbedrijf = $makebedrijf->id;
		$logo->move( base_path() . '/public/profile/',$logo->getClientOriginalName());
		$explodetools = explode(" ", $bedrijf->get('tool'));

		for ($i=0; $i < count($explodetools); ) { 
			$thetool = Tool::where('name','=',$explodetools[$i])->get()->toArray();
			if ($thetool) {
				Bedrijf_Tool::create([
					'bedrijf_id'=>$idbedrijf,
					'tool_id'=>$thetool[0]['id']
					]);
			}
			$i = $i+2;
		}

		return redirect('/bedrijven');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bedrijf = Bedrijf::find($id);
		$tools = $bedrijf->tools()->get();
		$allTools = [$bedrijf->toArray()];
		for ($i=0; $i < count($tools); $i++) { 
			$allTools[$i + 1] = $tools[$i]->tool->toArray();
		}
		
		for ($i=1; $i < count($allTools); $i++) {
			if ($i != 1) {
				$toolstring .= $allTools[$i]['name']." ".$allTools[$i]['version']." ";
			}else{
				$toolstring = $allTools[$i]['name']." ".$allTools[$i]['version']." ";
			}
			
		}
		
		return view('admin.edit',['bedrijf'=>$allTools, 'tools' => $toolstring]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, BedrijfFormRequest $bedrijf)
	{
		
		$bedrijfT = Bedrijf::find($id);
		if ($bedrijf->file('image') != null) {
			File::delete(base_path() . '/public/profile/'.$bedrijfT->img);
			$bedrijfT->img = $bedrijf->file('image')->getClientOriginalName();
			$bedrijf->file('image')->move(base_path() . '/public/profile/',$bedrijf->file('image')->getClientOriginalName());
		}

		$tools = Bedrijf_Tool::where('bedrijf_id','=',$id)->get();
		for ($i=0; $i < count($tools); $i++) { 
			$tools[$i]->delete();
		}
		$bedrijfT->name = $bedrijf->get('bedrijfsnaam');
		$bedrijfT->email = $bedrijf->get('email');
		$bedrijfT->disc = $bedrijf->get('bedrijfsinfo');
		$bedrijfT->save();

		$explodetools = explode(" ", $bedrijf->get('tool'));

		for ($i=0; $i < count($explodetools); ) { 
			$thetool = Tool::where('name','=',$explodetools[$i])->get()->toArray();
			if ($thetool) {
				Bedrijf_Tool::create([
					'bedrijf_id'=>$id,
					'tool_id'=>$thetool[0]['id']
					]);
			}
			$i = $i+2;
		}

		return redirect('/bedrijven');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$bedrijf = Bedrijf::find($id);
		File::delete(base_path() . '/public/profile/'.$bedrijf->img);
		$bedrijf->delete();
		return redirect('/bedrijven');
	}

}
