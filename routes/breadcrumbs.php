<?php
Breadcrumbs::register('inicio', function ($breadcrumbs) {
     $breadcrumbs->push('inicio', route('inicio'));
});

Breadcrumbs::register('potato', function ($breadcrumbs, $producto) {
    $breadcrumbs->parent('inicio');
    $breadcrumbs->push($producto->nombre, route('producto.detalle', $producto->id));
});
?>