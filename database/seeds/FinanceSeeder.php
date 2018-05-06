<?php

use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_codes')->insert(['name' => 'Income', 'company_id' => 1]);
        DB::table('expense_codes')->insert(['name' => 'Expense', 'company_id' => 1]);
        DB::table('expense_codes')->insert(['name' => 'Assets', 'company_id' => 1]);
        DB::table('expense_codes')->insert(['name' => 'Liabilities', 'company_id' => 1]);
        DB::table('expense_codes')->insert(['name' => 'Equity', 'company_id' => 1]);

        DB::table('expense_codes')->insert(['name' => 'Income', 'company_id' => 2]);
        DB::table('expense_codes')->insert(['name' => 'Expense', 'company_id' => 2]);
        DB::table('expense_codes')->insert(['name' => 'Assets', 'company_id' => 2]);
        DB::table('expense_codes')->insert(['name' => 'Liabilities', 'company_id' => 2]);
        DB::table('expense_codes')->insert(['name' => 'Equity', 'company_id' => 2]);

        DB::table('expense_codes')->insert(['name' => 'Income', 'company_id' => 3]);
        DB::table('expense_codes')->insert(['name' => 'Expense', 'company_id' => 3]);
        DB::table('expense_codes')->insert(['name' => 'Assets', 'company_id' => 3]);
        DB::table('expense_codes')->insert(['name' => 'Liabilities', 'company_id' => 3]);
        DB::table('expense_codes')->insert(['name' => 'Equity', 'company_id' => 3]);

        DB::table('financial_years')->insert(['name' => '2018/19 Financial Year', 'company_id' => 1]);
        DB::table('financial_years')->insert(['name' => '2018/19 Financial Year', 'company_id' => 2]);
        DB::table('financial_years')->insert(['name' => '2018/19 Financial Year', 'company_id' => 3]);

        for ($i = 1; $i <= 12; $i++)
        {
        	DB::table('financial_periods')->insert(['name' => '2018/19 Month '.$i, 'order' => $i, 'financial_year_id' => 1]);
        	DB::table('financial_periods')->insert(['name' => '2018/19 Month '.$i, 'order' => $i, 'financial_year_id' => 2]);
        	DB::table('financial_periods')->insert(['name' => '2018/19 Month '.$i, 'order' => $i, 'financial_year_id' => 3]);
        }

        DB::table('bank_accounts')->insert(['name' => 'Barclays Account '.$i, 'expense_code_id' => 3]);
        DB::table('bank_accounts')->insert(['name' => 'Halifax Account '.$i, 'expense_code_id' => 3]);
        DB::table('bank_accounts')->insert(['name' => 'Lloyds Account '.$i, 'expense_code_id' => 8]);
        DB::table('fixed_asset_categories')->insert(['name' => 'Intangible Assets', 'expense_code_id' => 3]);
        DB::table('fixed_asset_categories')->insert(['name' => 'Kitchen Equipment', 'expense_code_id' => 8]);
        DB::table('fixed_asset_categories')->insert(['name' => 'Cars', 'expense_code_id' => 8]);
        DB::table('fixed_asset_categories')->insert(['name' => 'Property', 'expense_code_id' => 13]);
        DB::table('fixed_asset_categories')->insert(['name' => 'Fixtures and Fittings', 'expense_code_id' => 13]);
        DB::table('purchase_ledgers')->insert(['name' => 'Sales Ledger', 'expense_code_id' => 4]);
        DB::table('purchase_ledgers')->insert(['name' => 'Purchase Ledger', 'expense_code_id' => 9]);
        DB::table('purchase_ledgers')->insert(['name' => 'Expense Ledger', 'expense_code_id' => 9]);
        DB::table('purchase_ledgers')->insert(['name' => 'Sales Ledger', 'expense_code_id' => 14]);
        DB::table('sales_ledgers')->insert(['name' => 'Sales Ledger', 'expense_code_id' => 3]);
        DB::table('sales_ledgers')->insert(['name' => 'Sales Ledger', 'expense_code_id' => 8]);
        DB::table('sales_ledgers')->insert(['name' => 'Sales Ledger', 'expense_code_id' => 13]);
        DB::table('stock_ledgers')->insert(['name' => 'Stock Ledger', 'expense_code_id' => 3]);
        DB::table('stock_ledgers')->insert(['name' => 'Stock Ledger', 'expense_code_id' => 8]);
        DB::table('stock_ledgers')->insert(['name' => 'Stock Ledger', 'expense_code_id' => 13]);

        DB::table('products_attributes')->insert(['name' => 'Pasta Type']);
        DB::table('products_attributes')->insert(['name' => 'Spicyness']);
        DB::table('products_attributes')->insert(['name' => 'Size']);
        DB::table('products_attributes_values')->insert(['name' => 'Spaghetti', 'product_attribute_id' => 1]);
        DB::table('products_attributes_values')->insert(['name' => 'Penne', 'product_attribute_id' => 1]);
        DB::table('products_attributes_values')->insert(['name' => 'Twists', 'product_attribute_id' => 1]);
        DB::table('products_attributes_values')->insert(['name' => 'Not Spicy', 'product_attribute_id' => 2]);
        DB::table('products_attributes_values')->insert(['name' => 'Slightly Spicy', 'product_attribute_id' => 2]);
        DB::table('products_attributes_values')->insert(['name' => 'Very Spicy', 'product_attribute_id' => 2]);
        DB::table('products_attributes_values')->insert(['name' => 'Painful', 'product_attribute_id' => 2]);
        DB::table('products_attributes_values')->insert(['name' => 'Small', 'product_attribute_id' => 3]);
        DB::table('products_attributes_values')->insert(['name' => 'Medium', 'product_attribute_id' => 3]);
        DB::table('products_attributes_values')->insert(['name' => 'Large', 'product_attribute_id' => 3]);
        DB::table('products_attributes_values')->insert(['name' => 'Supersize!', 'product_attribute_id' => 3]);
    }
}
