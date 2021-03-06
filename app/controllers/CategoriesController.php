<?php

class CategoriesController extends BaseController {

	/**
	 * Category Repository
	 *
	 * @var Category
	 */
	protected $category;

	public function __construct(Category $category)
	{
		$this->beforeFilter('auth');
		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::where('user_id', '=', Auth::id())->simplePaginate(10);

		return View::make('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Category::$rules);

		if ($validation->passes())
		{
			$this->category->create($input);

			return Redirect::route('categories.index')
											->with('success', '<strong>Sucesso</strong> Registro inserido!');
		}

		return Redirect::route('categories.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = $this->category->find($id);

		if (is_null($category))
		{
			return Redirect::route('categories.index');
		}

		return View::make('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Category::$rules);

		if ($validation->passes())
		{
			$category = $this->category->find($id);
			$category->update($input);

			return Redirect::route('categories.index')
											->with('success', '<strong>Sucesso</strong> Registro atualizado!');;
		}

		return Redirect::route('categories.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->category->find($id)->delete();

		return Redirect::route('categories.index')
										->with('success', '<strong>Sucesso</strong> Registro excluído!');
	}

	public function getCategories()
	{
		$allCategories = DB::table('categories')
							->select('*')
							->where('user_id', '=', Auth::id())
							->get();

		$categories[0] = 'Selecione uma categoria';

		foreach($allCategories as $category) {
    		$categories[$category->id] = $category->name;
		}

		return $categories;

	}
	
}
