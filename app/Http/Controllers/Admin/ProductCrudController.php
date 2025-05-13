<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');

        CRUD::addColumn([
            "name" => "name",
            "type" => "text",
            "label" => "Tên sản phẩm"
        ]);
        CRUD::addColumn([
            "name" => "slug",
            "type" => "text",
            "label" => "Link"
        ]);
        CRUD::addColumn([
            "name" => "firstImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "secondImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm 2",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "thirdImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm 3",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "description",
            "type" => "text",
            "label" => "Thông tin"
        ]);
        CRUD::addColumn([
            "name" => "price",
            "type" => "number",
            "label" => "Giá"
        ]);
        CRUD::addColumn([
            "name" => "quantity",
            "type" => "number",
            "label" => "Số lượng"
        ]);
        CRUD::addColumn([
            'name' => 'category_id',
            'label' => 'Danh mục',
            'type' => 'select',
            'entity' => 'categories', // phương thức trong model Product
            'attribute' => 'name', // cột hiển thị từ bảng categories
            'model' => Category::class
        ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            "name" => "name",
            "type" => "text",
            "label" => "Tên sản phẩm"
        ]);
        CRUD::addColumn([
            "name" => "slug",
            "type" => "text",
            "label" => "Link"
        ]);
        CRUD::addColumn([
            "name" => "firstImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "secondImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm 2",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "thirdImage",
            "type" => "image",
            "label" => "Ảnh sản phẩm 3",
            'prefix' => 'storage/',
        ]);
        CRUD::addColumn([
            "name" => "description",
            "type" => "text",
            "label" => "Thông tin"
        ]);
        CRUD::addColumn([
            "name" => "price",
            "type" => "number",
            "label" => "Giá"
        ]);
        CRUD::addColumn([
            "name" => "quantity",
            "type" => "number",
            "label" => "Số lượng"
        ]);
        CRUD::addColumn([
            'name' => 'category_id',
            'label' => 'Danh mục',
            'type' => 'select',
            'entity' => 'categories', // phương thức trong model Product
            'attribute' => 'name', // cột hiển thị từ bảng categories
            'model' => Category::class
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::addField([
            "name" => "name",
            "type" => "text",
            "label" => "Tên sản phẩm"
        ]);
        CRUD::addField([
            "name" => "slug",
            "type" => "text",
            "label" => "link"
        ]);
        CRUD::field('firstImage')
            ->type('upload')
            ->wrapper([
                "class" => 'form-group col-md-6'
            ])
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => 'assets', // the path inside the disk where file will be stored
            ]);
        CRUD::field('secondImage')
            ->type('upload')
            ->wrapper([
                "class" => 'form-group col-md-6'
            ])
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => 'assets', // the path inside the disk where file will be stored
            ]);
        CRUD::field('thirdImage')
            ->type('upload')
            ->wrapper([
                "class" => 'form-group col-md-6'
            ])
            ->withFiles([
                'disk' => 'public', // the disk where file will be stored
                'path' => 'assets', // the path inside the disk where file will be stored
            ]);

        CRUD::addField([
            "name" => "description",
            "type" => "text",
            "label" => "Thông tin",

        ]);
        CRUD::addField([
            "name" => "price",
            "type" => "number",
            "label" => "Giá",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6' // Bootstrap grid class
            ],

        ]);


        CRUD::addField([
            "name" => "quantity",
            "type" => "number",
            "label" => "Số lượng",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6' // Bootstrap grid class
            ],
        ]);

        CRUD::addField([
            'name' => 'category_id',
            'label' => 'Danh mục',
            'type' => 'select',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => Category::class,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4' // Bootstrap grid class
            ],
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
