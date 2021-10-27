<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']    = 'home';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
$route['invoice']               = 'invoiceController/index';

$route['/']                     = 'home/index';
$route['gohome']                = 'dashboardController/index';

$route['productMaster']         = 'ProductMasterController/index';
$route['addproduct']            = 'ProductMasterController/insert';
$route['purches']               = 'ProductMasterController/order';
$route['product']               = 'ProductMasterController/product';

$route['productDetails']        = 'ProductMasterController/productDetails';
$route['insert']                = 'ProductMasterController/product_insert';
$route['fetch']                 = 'ProductMasterController/fetch';
$route['saleData_fetch']        = 'ProductMasterController/sale_fetch';

$route['updateStock']           = 'ProductMasterController/updateStock';
$route['deleteProduct']         = 'ProductMasterController/deleteProduct';
$route['edit_product']          = 'ProductMasterController/editallSingleProduct';
$route['updateProduct']         = 'ProductMasterController/updateSingleRow';

$route['sales']                 = 'salesController/index';
$route['saleDetails']           = 'salesController/saleDetails';
$route['saleData_insert']       = 'salesController/insert_sale';
$route['todaySale']             = 'salesController/todaySale';
$route['customarNameSuggest']   = 'salesController/customarSuggetion';
$route['editSaleInfo']          = 'salesController/updateSale';
$route['updatesale']            = 'salesController/updateSale_request';
$route['discountSelect']        = 'salesController/discount_select_data';
$route['discountSave']          = 'salesController/discount_data_save';

$route['brand']                 = 'BrandController/brandIndex';
$route['brandInsert']           = 'BrandController/brand_insert';
$route['fetchBrand']            = 'BrandController/fetchBrand';

$route['expense']               = 'expenseController/index';
$route['insert_expense']        = 'expenseController/inserExpense';
$route['fetchExpense']          = 'expenseController/todayExpenseSelect';
$route['fetchExpenseMonthly']   = 'expenseController/monthlyExpenseSelect';

$route['saleExpense']           = 'saleExpenseController/index';
$route['fetchSaleExpense']      = 'saleExpenseController/monthly_Expense_Sale_Select';

$route['due']                   = 'dueController/index';
$route['fetchDue']              = 'dueController/selectAllDue';
$route['fetchDueDateWise']      = 'dueController/selectDateWasi';
$route['customarDue']           = 'dueController/customerDueMethod';
$route['editDue']               = 'dueController/selectSingleRow';
$route['updateDue']             = 'dueController/updateDueMethod';

$route['registation']           = 'home/register';
$route['register']              = 'home/register_request';
$route['loginRequest']          = 'home/loginRequest';

$route['discount']              = 'discountController/index';
$route['customerDiscount']      = 'discountController/customerDiscountMethod';
$route['fetchDiscount']         = 'discountController/selectAllDiscount';
$route['todayDiscount']         = 'discountController/todayDiscount';

$route['invoice']               = 'salesController/invoice';
$route['customer_view']         = 'salesController/customer_view';












