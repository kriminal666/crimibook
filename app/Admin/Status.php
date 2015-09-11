<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('Crimibook\Models\Status')->title('Status')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->with();
    $display->filters([
        Filter::related('user_id')->model('Crimibook\User'),
    ]);

    $display->columns([
        Column::string('users.name')->label('Owner')->append(Column::filter('user_id')),
        Column::string('body')->label('Text'),
        Column::string('image_path')->label('Photo path'),
        Column::image('image_path')->label('Photo'),

    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::select('user_id', 'User')->model('Crimibook\User')->display('name')->required(),
        FormItem::text('body', 'Body')->required(),
        FormItem::text('image_path', 'Photo'),

    ]);
    return $form;
});