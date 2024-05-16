<?php

namespace App\Livewire\Brand;

use App\Models\Brand as ModelsBrand;
use Livewire\Attributes\On;
use Livewire\Component;

class Brand extends Component
{
    public $brands;
    public $brandName;

    public function boot()
    {
        $this->getData();
    }

    #[On('update-data')]
    public function getData()
    {
        $this->brands = ModelsBrand::orderBy('brands.created_at', 'DESC')->get();
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
                message: "Nama merk sudah ada",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );

            return;
        }

        $category = ModelsBrand::create([
            'brand_name' => $this->brandName,
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
                message: "Berhasil menambah merk",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function editData($id)
    {
        $singleData = ModelsBrand::where('id', $id)->first();

        $this->brandName = $singleData->brand_name;
    }

    public function updateData($id)
    {
        $category = ModelsBrand::where('id', $id)->update([
            'brand_name' => $this->brandName,
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
                message: "Berhasil mengubah merk",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function deleteData($id)
    {
        $category = ModelsBrand::where('id', $id)->delete();

        if ($category) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menghapus merk",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function render()
    {
        return view('livewire.brand.brand');
    }

    private function checkData()
    {
        $data = ModelsBrand::where('brand_name', $this->brandName)->exists();

        return $data;
    }

    private function clearInput()
    {
        $this->brandName = '';
    }
}
