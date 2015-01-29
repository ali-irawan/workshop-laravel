<?php

class ContactTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testGetList()
	{
		$crawler = $this->client->request('GET', '/api/contact');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testAdd()
	{
		$data = [
			"name" => "Ali",
			"email" => "ali.irawan@solusiteknologi.co.id",
			"phone" => "081287736665"
		];
		$crawler = $this->client->request('POST', '/api/contact', $data);

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testEdit()
	{
		$first = Contact::first();
		$id = $first->id;

		$data = [
			"id" => $id,
			"name" => "Johan",
			"email" => "johan@solusiteknologi.co.id",
			"phone" => "081123445666"
		];
		$crawler = $this->client->request('PUT', '/api/contact/' . $id, $data);

		$this->assertTrue($this->client->getResponse()->isOk());

		$first = Contact::find($id);
		$this->assertTrue($first->name == "Johan");
		$this->assertTrue($first->email == "johan@solusiteknologi.co.id");
		$this->assertTrue($first->phone == "081123445666");
	}

	public function testRemove(){
		$first = Contact::first();
		$id = $first->id;
		
		$crawler = $this->client->request('DELETE', '/api/contact/' . $id);

		$this->assertTrue($this->client->getResponse()->isOk());		

		$first = Contact::find($id);
		$this->assertTrue($first == null);				
	}
}
