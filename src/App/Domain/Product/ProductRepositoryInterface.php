<?php


namespace Linkita\App\Domain\Product;


interface ProductRepositoryInterface
{
    public function getProductOrFail(string $product) : Product;
}
