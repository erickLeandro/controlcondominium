<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIdDwellerToExpenses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('expenses', function(Blueprint $table)
		{
			$table->dropColumn('id_dweller');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('expenses', function(Blueprint $table)
		{
			$table->dropColumn('id_dweller');
		});
	}

}
