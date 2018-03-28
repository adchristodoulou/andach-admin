<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialHrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('position_id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('hours_per_week_advertised', 8, 2);
            $table->timestamps();
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertisement_id');
            $table->integer('person_id');
            $table->integer('position_id');
            $table->date('date_of_application');
            $table->date('date_of_acceptance')->nullable();
            $table->date('date_of_rejection')->nullable();
            $table->string('status');
            $table->date('date_of_offer')->nullable();
            $table->decimal('offered_hours_per_week', 8, 2)->nullable();
            $table->decimal('offered_salary', 8, 2)->nullable();
            $table->decimal('offered_pay_per_hour', 8, 2)->nullable();
            $table->date('offered_start_date')->nullable();
            $table->integer('offered_working_hours')->nullable();
            $table->boolean('has_criminal_convictions')->nullable();
            $table->text('criminal_convictions_description')->nullable();
            $table->timestamps();
        });

        Schema::create('applications_references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id');
            $table->integer('advertisement_id');
            $table->integer('person_id');
            $table->integer('position_id');
            $table->string('company')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('postcode')->nullable();
            $table->boolean('can_contact_immediately')->nullable();
            $table->date('date_requested')->nullable();
            $table->date('date_response_received')->nullable();
            $table->boolean('is_response_acceptable')->nullable();
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('position_id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->date('continuous_employment_date');
            $table->date('date_of_leaving');
            $table->text('employee_leaving_comments')->nullable();
            $table->text('manager_leaving_comments')->nullable();
            $table->boolean('manager_would_employ_again')->nullable();
            $table->integer('employee_leaving_reason_category_id')->nullable();
            $table->integer('manager_leaving_reason_category_id')->nullable();
            $table->integer('leaving_authorised_by_id')->nullable();
            $table->timestamps();
        });

        Schema::create('appointments_pay', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('salary', 8, 2);
            $table->decimal('hourly_pay', 8, 2);
            $table->timestamps();
        });

        Schema::create('appointments_pension_contribution', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('employee_contribution_percentage', 8, 2)->default(0);
            $table->decimal('employer_contribution_percentage', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_type');
            $table->integer('parent_id');
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('companies_house_id')->nullable();
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('annual_hours_holiday', 8, 2);
            $table->boolean('bank_holidays_off')->nullable();
            $table->decimal('fte_hours_per_week', 8, 2);
            $table->boolean('is_zero_hours')->nullable();
            $table->integer('notice_period_days');
            $table->decimal('overtime_multiplier', 8, 2);
            $table->integer('pension_match_delay_months');
            $table->decimal('pension_match_up_to_percent', 8, 2);
            $table->decimal('pension_multipler', 8, 2);
            $table->boolean('will_work_nights');
            $table->timestamps();
        });

        Schema::create('contracts_sick_pay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_month');
            $table->integer('to_month');
            $table->integer('weeks_sick_pay');
            $table->integer('contract_id');
            $table->timestamps();
        });

        Schema::create('cost_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('company_id');
            $table->integer('parent_id');
            $table->timestamps();
        });

        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('datetime_of_interview');
            $table->boolean('outcome_successful')->nullable();
            $table->date('date_of_notification')->nullable();
            $table->integer('advertisement_id');
            $table->integer('person_id');
            $table->integer('position_id');
            $table->integer('application_id');
            $table->timestamps();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('company_id');
            $table->text('job_description_summary')->nullable();
            $table->text('job_description_full')->nullable();
            $table->boolean('requires_dbs_check_standard')->nullable();
            $table->boolean('requires_dbs_check_child_barred')->nullable();
            $table->boolean('requires_dbs_check_adult_barred')->nullable();
            $table->boolean('requires_dbs_check_extended')->nullable();
            $table->boolean('is_salaried')->nullable();
            $table->boolean('requires_criminal_information')->nullable();
            $table->boolean('requires_spent_criminal_information')->nullable();
            $table->integer('minimum_number_references_needed')->nullable();
            $table->integer('number_of_years_references_must_cover')->nullable();
            $table->timestamps();
        });

        Schema::create('jobs_authorised_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('area_id');
            $table->integer('company_id');
            $table->integer('job_id');
            $table->integer('grade_id');
            $table->decimal('hourly_pay_min', 8, 2)->nullable();
            $table->decimal('hourly_pay_max', 8, 2)->nullable();
            $table->decimal('salary_min', 8, 2)->nullable();
            $table->decimal('salary_max', 8, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('jobs_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('job_id');
            $table->boolean('evaluated_in_application')->nullable();
            $table->boolean('evaluated_in_interview')->nullable();
            $table->boolean('evaluated_in_test')->nullable();
            $table->boolean('is_essential')->nullable();
            $table->timestamps();
        });

        Schema::create('jobs_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order')->nullable();
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('link_appointments_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('appointment_id');
            $table->integer('contract_id');
            $table->timestamps();
        });

        Schema::create('link_appointments_working_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('appointment_id');
            $table->integer('working_hours_id');
            $table->timestamps();
        });

        Schema::create('link_cost_codes_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('cost_code_id');
            $table->integer('position_id');
            $table->integer('expense_signoff_limit_per_month')->nullable();
            $table->integer('expense_signoff_limit_per_item')->nullable();
            $table->timestamps();
        });

        Schema::create('link_jobs_allowed_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id');
            $table->integer('job_id');
            $table->timestamps();
        });

        Schema::create('person_documents_check', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('approver_id');
            $table->integer('person_id');
            $table->date('date_of_check')->nullable();
            $table->boolean('is_check_ok')->nullable();
            $table->boolean('have_seen_originals')->nullable();
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->integer('job_id');
            $table->integer('site_id');
            $table->integer('area_id');
            $table->integer('company_id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('weekly_hours_authorised', 8, 2)->nullable();
            $table->boolean('can_hire')->nullable();
            $table->boolean('can_manage_grievance')->nullable();
            $table->boolean('can_manage_disciplinary')->nullable();
            $table->boolean('can_manage_timesheets')->nullable();
            $table->boolean('can_manage_holiday')->nullable();
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('company_id');
            $table->integer('area_id');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('sites_salary_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('site_id');
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('working_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->decimal('mon_hours', 8, 2)->default(0);
            $table->decimal('tue_hours', 8, 2)->default(0);
            $table->decimal('wed_hours', 8, 2)->default(0);
            $table->decimal('thu_hours', 8, 2)->default(0);
            $table->decimal('fri_hours', 8, 2)->default(0);
            $table->decimal('sat_hours', 8, 2)->default(0);
            $table->decimal('sun_hours', 8, 2)->default(0);
            $table->decimal('total_hours', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('appointments_pay');
        Schema::dropIfExists('appointments_pension_contribution');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('applications_references');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('contracts_sick_pay');
        Schema::dropIfExists('cost_codes');
        Schema::dropIfExists('interviews');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('jobs_authorised_salaries');
        Schema::dropIfExists('jobs_criteria');
        Schema::dropIfExists('jobs_grades');
        Schema::dropIfExists('link_appointments_contracts');
        Schema::dropIfExists('link_appointments_working_hours');
        Schema::dropIfExists('link_cost_codes_positions');
        Schema::dropIfExists('link_jobs_allowed_contracts');
        Schema::dropIfExists('person_documents_check');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('sites');
        Schema::dropIfExists('sites_salary_areas');
        Schema::dropIfExists('working_hours');
    }
}
