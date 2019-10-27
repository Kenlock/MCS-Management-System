<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('/test', 'HomeController@test')->name('hometest');

    //    for test route
//    Route::resource('test','TestController');


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::get('users/banUser', 'UsersController@banUser')->name('users.banUser');
    Route::resource('users', 'UsersController');

    //profile
    Route::resource('profile', 'ProfileController');
//    Route::resource('profile','ProfileController');

    // Auditlogs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Myprofileinformations
//    Route::get('my-profile-informations/changePassword','MyProfileInformationController@showChangePasswordForm');
    Route::resource('my-profile-informations', 'MyProfileInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Updateprofileinformations
    Route::resource('update-profile-informations', 'UpdateProfileInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Changepasswords
    Route::resource('change-passwords', 'ChangePasswordController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
//    Route::resource('change-passwords', 'ChangePasswordController');
//    Route::get('change-passwords', 'ChangePasswordController@showChangePasswordForm');
//    oute::post('change-passwords', 'ChangePasswordController@changePassword');

//    Route::get('/change-password','ChangePasswordController@showChangePasswordForm');
    Route::post('/change-password','ChangePasswordController@changePassword')->name('change-password');


    // Enrolemonthlydeposits
    Route::resource('enrole-monthly-deposits', 'MonthlyDepositController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    Route::resource('monthly-deposits', 'MonthlyDepositController');

    // Contributionhistories
    Route::resource('contribution-histories', 'ContributionHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Projectstatuses
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');

    // Bankaccounts
    Route::delete('bank-accounts/destroy', 'BankAccountsController@massDestroy')->name('bank-accounts.massDestroy');
    Route::resource('bank-accounts', 'BankAccountsController');

    // Userstatuses
    Route::delete('user-statuses/destroy', 'UserStatusController@massDestroy')->name('user-statuses.massDestroy');
    Route::resource('user-statuses', 'UserStatusController');

    // Accounttypes
    Route::delete('account-types/destroy', 'AccountTypeController@massDestroy')->name('account-types.massDestroy');
    Route::resource('account-types', 'AccountTypeController');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    //Notices
    Route::delete('notice/destroy', 'NoticeController@massDestroy')->name('notices.massDestroy');
//    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('notice','NoticeController');



    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');


});
