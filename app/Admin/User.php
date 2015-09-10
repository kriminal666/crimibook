<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('Crimibook\User')->title('Users')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('name')->label('Name'),
		Column::string('email')->label('Email'),
        Column::string('verified')->label('Verified'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name')->required(),
		FormItem::text('email', 'Email')->required()->unique(),
        FormItem::checkbox('verified', 'Verified'),
	]);
	return $form;
});