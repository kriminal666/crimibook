<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('Crimibook\Models\Follow')->title('Users follows')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->with('users', 'userFollowsTo');
    $display->filters([
        Filter::related('follower_id')->model('Crimibook\User'),
        Filter::related('followed_id')->model('Crimibook\User'),
    ]);
    $display->columns([
        Column::string('users.name')->label('Follower Name')->append(Column::filter('follower_id')),
        Column::lists('userFollowsTo.name')->label('Follows To')->append(Column::filter('followed_id')),
    ]);
    return $display;
})->createAndEdit(function ()
{

    $form = AdminForm::form();
    $form->items([
        FormItem::select('follower_id', 'Follower Name')->model('Crimibook\User')->display('name')->required(),
        FormItem::multiselect('userFollowsTo', 'Follow To')->model('Crimibook\User')->display('name')
    ]);
    return $form;
});