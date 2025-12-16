@extends('errors::minimal')

@section('title', __('Acceso Denegado'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Usted no posee los roles y permisos para visualizar esta pagina'))
