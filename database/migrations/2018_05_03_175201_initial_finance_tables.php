<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialFinanceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->string('name')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledger_id');
            $table->integer('cost_code_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->decimal('current_quantity', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('expense_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('financial_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('financial_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order')->default(0);
            $table->integer('financial_year_id');
            $table->timestamps();
        });

        Schema::create('fixed_asset_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->string('name')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('fixed_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledger_id');
            $table->integer('cost_code_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->decimal('current_quantity', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('goods_delivery_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('stock_holding_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->timestamps();
        });

        Schema::create('goods_delivery_notes_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_delivered');
            $table->integer('goods_delivery_note_id');
            $table->integer('invoiceable_id');
            $table->string('invoiceable_type');
            $table->string('description')->default('');
            $table->timestamps();
        });

        Schema::create('goods_receipt_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('stock_holding_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->timestamps();
        });

        Schema::create('goods_receipt_notes_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_delivered');
            $table->integer('goods_receipt_note_id');
            $table->integer('invoiceable_id');
            $table->string('invoiceable_type');
            $table->string('description')->default('');
            $table->timestamps();
        });

        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->integer('person_id');
            $table->integer('company_id');
            $table->integer('financial_period_id');
            $table->timestamps();
        });

        Schema::create('journals_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('journal_id');
            $table->integer('cost_code_id');
            $table->integer('expense_code_id');
            $table->decimal('debit_credit', 8, 2)->default(0);
            $table->decimal('quantity_movement', 8, 2)->default(0);
            $table->integer('ledgerable_id');
            $table->string('ledgerable_type');
            $table->integer('componentable_id')->default(0);
            $table->string('componentable_type')->default('');
            $table->timestamps();
        });

        Schema::create('link_expense_codes_financial_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->integer('financial_period_id');
            $table->boolean('is_open')->default(0);
            $table->timestamps();
        });

        Schema::create('link_products_products_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('product_attribute_id');
            $table->timestamps();
        });

        Schema::create('link_products_variations_attribute_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_variation_id');
            $table->integer('product_attribute_value_id');
            $table->decimal('purchase_price', 8, 2)->default(0);
            $table->decimal('sale_price', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products_attributes_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('product_attribute_id');
            $table->timestamps();
        });

        Schema::create('products_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('product_id');
            $table->timestamps();
        });

        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledger_id');
            $table->integer('cost_code_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->decimal('current_quantity', 8, 2)->default(0);
            $table->integer('person_id');
            $table->string('filename');
            $table->decimal('total_net', 8, 2)->default(0);
            $table->decimal('total_vat', 8, 2)->default(0);
            $table->decimal('total_gross', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('purchase_invoices_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_invoice_id');
            $table->integer('invoiceable_id')->default(0);
            $table->string('invoiceable_type')->default('');
            $table->decimal('total_net', 8, 2)->default(0);
            $table->decimal('total_vat', 8, 2)->default(0);
            $table->decimal('total_gross', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('purchase_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->string('name')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('quantity_purchased_reconciliation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_reconciled');
            $table->timestamps();
        });

        Schema::create('quantity_purchased_reconciliation_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_purchased_reconciliation_id');
            $table->integer('reconcileable_id')->default(0);
            $table->string('reconcileable_type')->default('');
            $table->timestamps();
        });

        Schema::create('quantity_sold_reconciliation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_reconciled');
            $table->timestamps();
        });

        Schema::create('quantity_sold_reconciliation_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_purchased_reconciliation_id');
            $table->integer('reconcileable_id')->default(0);
            $table->string('reconcileable_type')->default('');
            $table->timestamps();
        });

        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledger_id');
            $table->integer('cost_code_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->decimal('current_quantity', 8, 2)->default(0);
            $table->integer('person_id');
            $table->string('filename');
            $table->decimal('total_net', 8, 2)->default(0);
            $table->decimal('total_vat', 8, 2)->default(0);
            $table->decimal('total_gross', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('sales_invoices_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_invoice_id');
            $table->integer('invoiceable_id')->default(0);
            $table->string('invoiceable_type')->default('');
            $table->decimal('total_net', 8, 2)->default(0);
            $table->decimal('total_vat', 8, 2)->default(0);
            $table->decimal('total_gross', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('sales_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->string('name')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('stock_holdings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ledger_id');
            $table->integer('cost_code_id');
            $table->date('document_date');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->decimal('current_quantity', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('stock_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->string('name')->default('');
            $table->decimal('current_value', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('trial_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_code_id');
            $table->integer('cost_code_id');
            $table->integer('financial_period_id');
            $table->integer('company_id');
            $table->decimal('debit_credit', 8, 2)->default(0);
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
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('bank_transactions');
        Schema::dropIfExists('expense_codes');
        Schema::dropIfExists('financial_years');
        Schema::dropIfExists('financial_periods');
        Schema::dropIfExists('fixed_asset_categories');
        Schema::dropIfExists('fixed_assets');
        Schema::dropIfExists('goods_delivery_notes');
        Schema::dropIfExists('goods_delivery_notes_lines');
        Schema::dropIfExists('goods_receipt_notes');
        Schema::dropIfExists('goods_receipt_notes_lines');
        Schema::dropIfExists('journals');
        Schema::dropIfExists('journals_lines');
        Schema::dropIfExists('link_expense_codes_financial_periods');
        Schema::dropIfExists('link_products_products_attributes');
        Schema::dropIfExists('link_products_variations_attribute_values');
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_attributes');
        Schema::dropIfExists('products_attributes_values');
        Schema::dropIfExists('products_variations');
        Schema::dropIfExists('purchase_invoices');
        Schema::dropIfExists('purchase_invoices_lines');
        Schema::dropIfExists('purchase_ledgers');
        Schema::dropIfExists('quantity_purchased_reconciliation');
        Schema::dropIfExists('quantity_purchased_reconciliation_lines');
        Schema::dropIfExists('quantity_sold_reconciliation');
        Schema::dropIfExists('quantity_sold_reconciliation_lines');
        Schema::dropIfExists('sales_invoices');
        Schema::dropIfExists('sales_invoices_lines');
        Schema::dropIfExists('sales_ledgers');
        Schema::dropIfExists('stock_holdings');
        Schema::dropIfExists('stock_ledgers');
        Schema::dropIfExists('trial_balances');
    }
}
