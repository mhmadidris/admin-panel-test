<?php

namespace App\Livewire\Catalog;

use App\Models\Brand;
use App\Models\Catalog as ModelsCatalog;
use App\Models\Category;
use App\Models\Unit;
use Livewire\Attributes\On;
use Livewire\Component;

class Catalog extends Component
{
    public $catalogs;
    public $catalogName, $catalogBrand, $catalogCategory, $catalogUnit, $catalogStatus;

    public $brands, $categories, $units;

    public function boot()
    {
        $this->getData();
    }

    #[On('update-data')]
    public function getData()
    {
        $this->brands = Brand::all();
        $this->categories = Category::all();
        $this->units = Unit::all();

        $this->catalogs = ModelsCatalog::select('catalogs.*', 'brands.brand_name', 'categories.category_name', 'units.unit_name', 'units.unit_code')
            ->join('brands', 'catalogs.brand_id', 'brands.id')
            ->join('categories', 'catalogs.category_id', 'categories.id')
            ->join('units', 'catalogs.unit_id', 'units.id')
            ->orderBy('catalogs.created_at', 'DESC')
            ->get();
    }

    public function saveData()
    {
        $checkData = $this->checkData();

        if ($checkData) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "info",
                message: "Kode katalog sudah ada",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );

            return;
        }

        $category = ModelsCatalog::create([
            'catalog_name' => $this->catalogName,
            'brand_id' => $this->catalogBrand,
            'category_id' => $this->catalogCategory,
            'unit_id' => $this->catalogUnit,
            'catalog_status' => $this->catalogStatus,
        ]);

        if ($category) {
            $this->clearInput();

            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menambah katalog",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function editData($id)
    {
        $singleData = ModelsCatalog::select('catalogs.*', 'brands.brand_name', 'categories.category_name', 'units.unit_name', 'units.unit_code')
            ->where('catalogs.id', $id)
            ->join('brands', 'catalogs.brand_id', 'brands.id')
            ->join('categories', 'catalogs.category_id', 'categories.id')
            ->join('units', 'catalogs.unit_id', 'units.id')
            ->first();

        $this->catalogName = $singleData->catalog_name;
        $this->catalogBrand = $singleData->brand_id;
        $this->catalogCategory = $singleData->category_id;
        $this->catalogUnit = $singleData->unit_id;
        $this->catalogStatus = $singleData->catalog_status;
    }

    public function updateData($id)
    {
        $category = ModelsCatalog::where('id', $id)
            ->update([
                'catalog_name' => $this->catalogName,
                'brand_id' => $this->catalogBrand,
                'category_id' => $this->catalogCategory,
                'unit_id' => $this->catalogUnit,
                'catalog_status' => $this->catalogStatus,
            ]);

        if ($category) {
            $this->clearInput();

            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil mengubah katalog",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function deleteData($id)
    {
        $category = ModelsCatalog::where('id', $id)->delete();

        if ($category) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menghapus katalog",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function render()
    {
        return view('livewire.catalog.catalog');
    }

    private function checkData()
    {
        $data = ModelsCatalog::where('catalog_name', $this->catalogName)->exists();

        return $data;
    }

    private function clearInput()
    {
        $this->catalogName = '';
        $this->catalogBrand = '';
        $this->catalogCategory = '';
        $this->catalogUnit = '';
        $this->catalogStatus = '';
    }
}
