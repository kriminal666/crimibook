<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('Crimibook\Models\Album')->title('Albums')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->with('owner');
    $display->filters([
        Filter::related('user_id')->model('Crimibook\User'),
    ]);

        $display->columns([
            Column::string('name')->label('Name'),
            Column::string('description')->label('Description'),
            Column::string('owner.name')->label('Owner')->append(Column::filter('user_id')),
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::text('name', 'Name')->required(),
        FormItem::text('description', 'Description')->required(),
        FormItem::select('user_id', 'User')->model('Crimibook\User')->display('name')->required(),
    ]);
    return $form;
});