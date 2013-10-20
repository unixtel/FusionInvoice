<?php namespace FI\Storage\Eloquent\Repositories;

use \FI\Storage\Eloquent\Models\InvoiceGroup;

class InvoiceGroupRepository implements \FI\Storage\Interfaces\InvoiceGroupRepositoryInterface {
	
	public function all()
	{
		return InvoiceGroup::all();
	}

	public function getPaged($page = 1, $numPerPage = null)
	{
		\DB::getPaginator()->setCurrentPage($page);
		return InvoiceGroup::paginate($numPerPage ?: \Config::get('defaultNumPerPage'));
	}

	public function find($id)
	{
		return InvoiceGroup::find($id);
	}

	public function lists()
	{
		return InvoiceGroup::lists('name', 'id');
	}
	
	public function create($input)
	{
		InvoiceGroup::create($input);
	}
	
	public function update($input, $id)
	{
		$invoiceGroup = InvoiceGroup::find($id);
		$invoiceGroup->fill($input);
		$invoiceGroup->save();
	}
	
	public function delete($id)
	{
		InvoiceGroup::destroy($id);
	}
	
}