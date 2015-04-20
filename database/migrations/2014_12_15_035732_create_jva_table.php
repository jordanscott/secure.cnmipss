<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJvaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jvas', function(Blueprint $table)
		{
			$table->increments ('id');
			$table->integer    ('user_id');
			$table->string     ('date_received');
			$table->string     ('first_name');
			$table->string     ('last_name', 15);
			$table->string     ('ssn');
			$table->string     ('mailing_address', 30);
			$table->string     ('position');
			$table->string     ('jva_number');
			$table->boolean    ('full_time');
			$table->boolean    ('part_time');
			$table->string     ('salary_desired');
			$table->boolean    ('cnmi_govt_retiree');
			$table->boolean    ('former_pss_employee');
			$table->boolean    ('military');
			$table->boolean    ('resume');
			$table->boolean    ('police_clearance');
			$table->boolean    ('medical_clearance');
			$table->boolean    ('cert_received');
			$table->string     ('cert_type');
			$table->string     ('cert_expiration');
			$table->string     ('college_degree');
			$table->datetime   ('completed_on')->nullable();
			$table->timestamps ();

			// Date Received
			// First Name (10 character line would suffice - I think)
			// Last Name (15 character line would suffice - I think)
			// SSN (xxx-xx-xxxx)
			// Mailing Address (3 - 15 character lines)
			// Position Applied For (text box)
			// JVA # (xxxx-xxx)
			// Full Time/Part Time (F/P)
			// Salary Desired (7 character line/box)
			// CNMI Gov't Retiree (Yes/No)
			// Former PSS Employee (Yes/No)
			// Military Experience (Yes/No)
			// Resume Received (Yes/No)
			// Police Clearance Received (Yes/No)
			// Medical Clearance Received (Yes/No)
			// Certification Received (Yes/No)
			// Certification Type (Prov, BI, BII, St, Prof, OT)
			// Certification Expiration Date (Month/Day/Year)
			// College Degree (3 character line/box - for N/A, AA, AAS, AS, BA, BS, MA, MS, M.Ed., MBA, Ed.D., Ph.D.)
			// (all questions under General Information header #1 - 13 - which are all Yes/No Questions - so 13 identifiers with Yes or No as the only answer option).

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jvas');
	}

}
